<?php namespace Anomaly\UsersModule\User\Contract;

interface UserRepositoryInterface
{

    public function create($username, $email, $password);
}
 