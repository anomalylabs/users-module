<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

class UserSession
{
    protected $persistence;

    function __construct(PersistenceService $persistence)
    {
        $this->persistence = $persistence;
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

        $this->flushSession();

        if ($userId) {

            $this->persistence->forget($userId);

        }
    }

    public function check()
    {
        return app('session')->get($this->getSessionKey(), $this->getPersistentUserId());
    }

    protected function updateSession($userId)
    {
        app('session')->put($this->getSessionKey(), $userId);

        app('session')->migrate(true);
    }

    protected function flushSession()
    {
        app('session')->flush();
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
        return null;
    }
}
 