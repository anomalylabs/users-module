<?php

return [
    \Anomaly\UsersModule\User\UserModel::class => [
        'title'       => 'username',
        'description' => 'email',
        //'view_path'   => 'entry.path',
        'edit_path'   => 'admin/users/edit/{entry.id}'
    ]
];
