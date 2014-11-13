<?php namespace Anomaly\Streams\Addon\Module\Users\Support;

use Illuminate\Session\Store;

/**
 * Class Session
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Support
 */
class Session
{

    /**
     * The session key.
     *
     * @var null
     */
    protected $key = null;

    /**
     * The session store.
     *
     * @var
     */
    protected $store;

    /**
     * Create a new Session instance.
     *
     * @param Store $store
     */
    function __construct(Store $store)
    {
        $this->store = $store;

        $this->key = config('module.users::session');
    }

    /**
     * Put a value in the session.
     *
     * @param $value
     */
    public function put($value)
    {
        $this->store->put($this->getKey(), $value);
    }

    /**
     * Get a value from the session.
     *
     * @return mixed
     */
    public function get()
    {
        return $this->store->get($this->getKey());
    }

    /**
     * Remove an item from the session.
     */
    public function forget()
    {
        $this->store->forget($this->getKey());
    }

    /**
     * Get the session key.
     *
     * @return null|string
     */
    protected function getKey()
    {
        if (!$this->key) {

            return md5(get_class($this));
        }

        return $this->key;
    }
}
 