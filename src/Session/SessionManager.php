<?php namespace Anomaly\Streams\Addon\Module\Users\Session;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel;
use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

class SessionManager
{
    protected $persistence;

    protected $persistences;

    function __construct(PersistenceService $persistence, PersistenceModel $persistences)
    {
        $this->persistence  = $persistence;
        $this->persistences = $persistences;
    }

    public function login($userId, $remember = false)
    {
        $this->updateSession($userId);

        if ($remember) {

            $code = $this->persistence->persist($userId);

            $this->storePersistenceCode($userId, $code);

        }
    }

    public function logout()
    {
        $userId = $this->check();

        $this->flushAndForget();

        if ($userId) {

            $this->persistence->forget($userId);

        }
    }

    protected function flushAndForget()
    {
        app('session')->flush();

        app('cookie')->queue(app('cookie')->forget($this->getPersistenceKey()));
    }

    public function check()
    {
        $userId = app('session')->get($this->getSessionKey());

        if (!$userId) {

            $userId = $this->getPersistentUserId();

        }

        return $userId;
    }

    protected function updateSession($userId)
    {
        app('session')->put($this->getSessionKey(), $userId);

        app('session')->migrate(true);
    }

    protected function storePersistenceCode($userId, $code)
    {
        $cookie = app('cookie');

        $cookie->queue($cookie->forever($this->getPersistenceKey(), "{$userId}|{$code}"));
    }

    protected function getSessionKey()
    {
        return 'login_' . md5(get_class($this));
    }

    protected function getPersistenceKey()
    {
        return 'remember_' . md5(get_class($this));
    }

    protected function getPersistentUserId()
    {
        if ($remember = $this->getPersistenceValue()) {

            list($userId, $code) = explode('|', $remember);

            if ($this->persistence->check($userId, $code)) {

                $this->updateSession($userId);

                return $userId;

            }

        }

        return null;
    }

    protected function getPersistenceValue()
    {
        $value = app('request')->cookies->get($this->getPersistenceKey());

        if (str_contains($value, '|')) {

            return $value;

        }

        return null;
    }
}
 