<?php namespace Anomaly\UsersModule\User\Table\Column;

use Anomaly\Streams\Platform\Ui\Table\Component\Column\Column;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class StatusColumn
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\Column
 */
class StatusColumn extends Column
{

    /**
     * Ge the value.
     *
     * @return string
     */
    public function getValue()
    {
        /* @var UserInterface $entry */
        $entry = $this->getEntry();

        if ($entry->isSuspended()) {
            return '<span class="label label-danger">' . trans(
                'anomaly.module.users::field.status.suspended'
            ) . '</span>';
        }

        if (!$entry->isActivated()) {
            return '<span class="label label-default">' . trans(
                'anomaly.module.users::field.status.inactive'
            ) . '</span>';
        }

        return '<span class="label label-success">' . trans(
            'anomaly.module.users::field.status.active'
        ) . '</span>';
    }
}
