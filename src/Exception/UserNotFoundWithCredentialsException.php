<?php namespace Anomaly\Streams\Addon\Module\Users\Exception;

class UserNotFoundWithCredentialsException extends \Exception
{
    protected $message = 'module.users::exception.user_not_found_by_credentials';
}
 