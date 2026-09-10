<?php namespace Anomaly\UsersModule\Traits;

/**
 * Trait RedirectsSafely
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
trait RedirectsSafely
{

    /**
     * Return the target if it points at this application, otherwise the fallback.
     *
     * @param  mixed  $target
     * @param  string $fallback
     * @return string
     */
    protected function resolveRedirect($target, $fallback = '/')
    {
        if (!is_string($target) || !$target = trim($target)) {
            return $fallback;
        }

        /*
         * Browsers read a backslash in a URL as a forward slash, so "/\evil.example"
         * leaves the site despite looking relative. Control characters can be used to
         * hide the same thing from a naive parse.
         */
        if (str_contains($target, '\\') || preg_match('/[\x00-\x1F\x7F]/', $target)) {
            return $fallback;
        }

        if (str_starts_with($target, '//')) {
            return $fallback;
        }

        if (($parts = parse_url($target)) === false) {
            return $fallback;
        }

        if ($host = array_get($parts, 'host')) {
            return $host === $this->request->getHost() ? $target : $fallback;
        }

        return array_get($parts, 'scheme') ? $fallback : $target;
    }
}
