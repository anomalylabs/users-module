<?php namespace Streams\Addon\Module\Users\Installer;

use Streams\Core\Stream\Installer\StreamInstaller;

class ThrottleStreamInstaller extends StreamInstaller
{
    /**
     * The stream fields assignments definitions.
     *
     * @var array
     */
    protected $assignments = [
        'user'            => ['is_required' => true],
        'ip_address'      => ['is_required' => true],
        'attempts'        => ['is_required' => true],
        'suspended'       => ['is_required' => true],
        'banned'          => ['is_required' => true],
        'last_attempt_at' => [],
        'suspended_at'    => [],
        'banned_at'       => [],
    ];
}
