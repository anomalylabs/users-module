<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class ResetController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class ResetController extends PublicController
{

    /**
     * Return the forgot password view.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function reset()
    {
        return $this->view->make('anomaly.module.users::reset');
    }
}
