<?php namespace Anomaly\Streams\Addon\Module\Users\Support;

use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

/**
 * Class Cookie
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Support
 */
class Cookie
{

    /**
     * The cookie key.
     *
     * @var null
     */
    protected $key = null;

    /**
     * The request object.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The cookie jar.
     *
     * @var \Illuminate\Cookie\CookieJar
     */
    protected $jar;

    /**
     * Create a new Cookie instance.
     *
     * @param Request   $request
     * @param CookieJar $jar
     */
    function __construct(Request $request, CookieJar $jar)
    {
        $this->jar     = $jar;
        $this->request = $request;
    }

    /**
     * Put a value in the cookie.
     *
     * @param $value
     */
    public function put($value)
    {
        $cookie = $this->jar->forever($this->getKey(), $value);

        $this->jar->queue($cookie);
    }

    /**
     * Get a value from the cookie.
     *
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function get()
    {
        return $this->jar->queued(
            $this->getKey(),
            function () {

                return $this->request->cookie($this->getKey());
            }
        );
    }

    /**
     * Remove a cookie.
     */
    public function forget()
    {
        $cookie = $this->jar->forget($this->getKey());

        $this->jar->queue($cookie);
    }

    /**
     * Get the cookie key.
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
 