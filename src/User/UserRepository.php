<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    protected $model;

    function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function create($username, $email, $password)
    {
        $user = $this->model->newInstance();

        $user->email    = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return $user;
    }
}
