<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

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
        $user->password = app('hash')->make($password);

        $user->save();

        return $user;
    }
}
 