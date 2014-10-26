<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\User;

use Anomaly\Streams\Platform\Ui\Table\TableUi;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class UserTableUi extends TableUi
{
    protected function boot()
    {
        $this->setModel(new UserModel());

        $this->setColumns(
            [
                'first_name',
                'last_name',
                'email',
                'username',
                'last_login_at',
                'last_activity_at',
            ]
        );
    }
}
 