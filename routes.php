<?php

// List all users
Route::get('admin/users', 'Addon\Module\Users\Controller\Admin\UsersController@index');