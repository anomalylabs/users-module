<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class PasswordController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
