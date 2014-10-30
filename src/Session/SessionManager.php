<?php namespace Anomaly\Streams\Addon\Module\Users\Session;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel;
use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

/**
 * Class SessionManager
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session
 */
class SessionManager
{

    /**
     * The persistence service.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService
     */
    protected $persistence;

    /**
     * The persistences repository interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel
     */
    protected $persistences;

    /**
     * Create a new SessionManager instance.
     *
     * @param PersistenceService $persistence
     * @param PersistenceModel   $persistences
     */
    function __construct(PersistenceService $persistence, PersistenceModel $persistences)
    {
        $this->persistence  = $persistence;
        $this->persistences = $persistences;
    }

    /**
     * Create a session for a user ID.
     *
     * @param      $userId
     * @param bool $remember
     */
    public function login($userId, $remember = false)
    {
        $this->updateSession($userId);

        if ($remember) {

            $code = $this->persistence->persist($userId);

            $this->storePersistenceCode($userId, $code);
        }
    }

    /**
     * Terminate the session.
     */
    public function logout()
    {
        $userId = $this->check();

        $this->flushAndForget();

        if ($userId) {

            $this->persistence->forget($userId);
        }
    }

    /**
     * Flush and forget everything.
     */
    protected function flushAndForget()
    {
        app('session')->flush();

        app('cookie')->queue(app('cookie')->forget($this->getPersistenceKey()));
    }

    /**
     * Check if there is a user ID in the active session.
     *
     * @return null
     */
    public function check()
    {
        $userId = app('session')->get($this->getSessionKey());

        if (!$userId) {

            $userId = $this->checkPersistence();
        }

        return $userId;
    }

    /**
     * Write the user ID to the session.
     *
     * @param $userId
     */
    protected function updateSession($userId)
    {
        app('session')->put($this->getSessionKey(), $userId);

        app('session')->migrate(true);
    }

    /**
     * Queue the persistence code in a cookie for a user ID.
     *
     * @param $userId
     * @param $code
     */
    protected function storePersistenceCode($userId, $code)
    {
        $cookie = app('cookie');

        $cookie->queue($cookie->forever($this->getPersistenceKey(), "{$userId}|{$code}"));
    }

    /**
     * Get the session key.
     *
     * @return string
     */
    protected function getSessionKey()
    {
        return 'login_' . md5(get_class($this));
    }

    /**
     * Get the persistence key.
     *
     * @return string
     */
    protected function getPersistenceKey()
    {
        return 'remember_' . md5(get_class($this));
    }

    /**
     * Check persistence and update if found.
     *
     * @return null
     */
    protected function checkPersistence()
    {
        if ($remember = $this->getPersistenceValue()) {

            list($userId, $code) = explode('|', $remember);

            if ($this->persistence->check($userId, $code)) {

                // Put the ID back in the session.
                $this->updateSession($userId);

                return $userId;
            }
        }

        return null;
    }

    /**
     * Get the stored persistence value.
     *
     * @return null
     */
    protected function getPersistenceValue()
    {
        $value = app('request')->cookies->get($this->getPersistenceKey());

        if (str_contains($value, '|')) {

            return $value;
        }

        return null;
    }
}
 