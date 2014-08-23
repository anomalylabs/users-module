<?php namespace Addon\Module\Users\Controller\Admin;

use Streams\Core\Ui\TableUi;
use Streams\Core\Controller\AdminController;
use Addon\Module\Users\Model\UserEntryModel;

class UsersController extends AdminController
{
    /**
     * Create a new UsersController instance.
     */
    public function __construct()
    {
        $this->users = new UserEntryModel();
        $this->table = new TableUi($this->users);
    }

    /**
     * Display a table of all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return $this->table
            ->setColumns(
                [
                    'email',
                    'name',
                ]
            )
            ->render();
    }
}