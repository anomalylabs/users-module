<?php namespace Anomaly\Streams\Addon\Module\Users\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class TokensStreamInstaller extends StreamInstaller
{
    /**
     * Field assignments for the Tokens stream.
     *
     * @var array
     */
    protected $assignments = [
        'token_type' => [],
        'token'      => [],
    ];
}
 