<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Encryption\Encrypter;

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
     * Return a forgot password view.
     */
    public function forgot()
    {
        return $this->view->make('anomaly.module.users::forgot');
    }

    /**
     * Reset a user password.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function reset()
    {
        return $this->view->make('anomaly.module.users::reset');
    }
}
