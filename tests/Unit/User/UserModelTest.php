<?php namespace Anomaly\UsersModuleTest\Unit\User;

use Anomaly\UsersModule\Role\RoleCollection;
use Anomaly\UsersModule\Role\RoleModel;
use Anomaly\UsersModule\User\UserModel;
use Anomaly\UsersModuleTest\Traits\UserWithRoles;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class UserModelTest
 * @package Anomaly\UsersModuleTest
 */
class UserModelTest extends \TestCase
{
    use UserWithRoles, DatabaseTransactions;

    /** @test */
    public function returnsTheUsersRolesCorrectly()
    {
        $roleCollection = new RoleCollection();
        $roleCollection->add(factory(RoleModel::class)->create(['slug' => 'first_role']));
        $roleCollection->add(factory(RoleModel::class)->create(['slug' => 'second_role']));

        /** @var UserModel $user */
        $user = $this->getUserWithRoles($roleCollection);

        $this->assertTrue($user->hasRole($roleCollection->first()));
        $this->assertTrue($user->hasRole($roleCollection->last()));
        $this->assertEquals(
            $roleCollection->pluck('slug')->toArray(),
            $user->getRoles()->pluck('slug')->toArray()
        );
    }
}