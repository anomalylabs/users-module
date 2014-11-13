<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceInterface;
use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Support\Cookie;
use Anomaly\Streams\Addon\Module\Users\Support\Session;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class PersistenceRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence
 */
class PersistenceRepository implements PersistenceRepositoryInterface
{

    /**
     * The persistence model.
     *
     * @var
     */
    protected $model;

    /**
     * The session object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Support\Session
     */
    protected $session;

    /**
     * The cookie object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Support\Cookie
     */
    protected $cookie;

    /**
     * Create a new PersistenceRepository instance.
     *
     * @param PersistenceModel $model
     * @param Session          $session
     * @param Cookie           $cookie
     */
    function __construct(PersistenceModel $model, Session $session, Cookie $cookie)
    {
        $this->model   = $model;
        $this->cookie  = $cookie;
        $this->session = $session;
    }

    /**
     * Check the current session for a persistence code.
     *
     * @return mixed
     */
    public function check()
    {
        if ($code = $this->session->get()) {

            return $code;
        }

        if ($code = $this->cookie->get()) {

            $this->session->put($code);

            return $code;
        }

        return null;
    }


    /**
     * Persist a user session.
     *
     * @param UserInterface $user
     * @param bool          $remember
     * @return mixed
     */
    public function persist(UserInterface $user, $remember = false)
    {
        $this->flush($user);

        $persistence = $this->create($user);

        if (!$persistence instanceof PersistenceInterface) {

            throw new \Exception("Could not create persistence for user.");
        }

        $this->session->put($persistence->getCode());

        if ($remember) {

            $this->cookie->put($persistence->getCode());
        }
    }

    /**
     * Find a persistence by it's code.
     *
     * @param $code
     * @return mixed
     */
    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    /**
     * Flush persistence for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function flush(UserInterface $user)
    {
        $user->getId();

        $active = $this->check();

        $this->model
            ->where('user_id', $user->getId())
            ->where('code', '!=', (string)$active)
            ->delete();
    }

    /**
     * Create a new persistence code for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function create(UserInterface $user)
    {
        $persistence = $this->model->newInstance();

        $persistence->user_id = $user->getId();

        $persistence->code = rand_string(40);

        $persistence->save();

        return $persistence;
    }

    /**
     * Delete a persistence code.
     *
     * @param $code
     * @return mixed
     */
    public function delete($code)
    {
        $this->model->where('code', $code)->delete();
    }

    /**
     * Remove the persistence bound to the current session.
     *
     * @return mixed
     */
    public function forget()
    {
        $this->session->forget();
        $this->cookie->forget();
    }
}
 