<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\User;

use Anomaly\Streams\Platform\Ui\Table\TableUi;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;

class UserTableUi extends TableUi
{
    protected function boot()
    {
        $this->setModel(new UsersUsersEntryModel());
    }
}
 