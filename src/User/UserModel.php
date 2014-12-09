<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class UserModel extends UsersUsersEntryModel implements ConfideUserInterface
{

    use ConfideUser;
}
 