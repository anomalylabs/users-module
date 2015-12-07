<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class PasswordController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class PasswordController extends PublicController
{

    /**
     * Reset a user password.
     */
    public function reset()
    {
        return $this->view->make('anomaly.module.users::reset');
    }
}
