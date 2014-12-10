<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

interface UserRepositoryInterface
{

    public function create($username, $email, $password);
}
 