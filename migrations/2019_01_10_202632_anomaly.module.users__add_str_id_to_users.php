<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class AnomalyModuleUsersAddStrIdToUsers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleUsersAddStrIdToUsers extends Migration
{

    /**
     * Don't delete the stream.
     * Used for reference only.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id' => 'anomaly.field_type.text',
    ];

    /**
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'users',
    ];

    /**
     * @var array
     */
    protected $assignments = [
        'str_id' => [
            'required' => true,
            'unique'   => true,
        ],
    ];

    /**
     * Run the migrations.
     */
    public function up()
    {
        /* @var UserRepositoryInterface $users */
        $users = app(UserRepositoryInterface::class);

        /* @var UserInterface|EloquentModel $user */
        foreach ($users->all() as $user) {
            $users->save($user->setRawAttribute('str_id', str_random(24)));
        }
    }

}
