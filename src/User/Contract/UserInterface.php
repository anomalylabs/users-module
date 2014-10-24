<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

interface UserInterface
{

    public function getUserId();

    public function setPasswordAttribute($password);

}
 