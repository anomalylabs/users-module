<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Illuminate\Auth\Authenticatable;
use Laracasts\Commander\Events\EventGenerator;

class UserModel extends UsersUsersEntryModel implements UserInterface, \Illuminate\Contracts\Auth\Authenticatable
{

    use Authenticatable;
}
 