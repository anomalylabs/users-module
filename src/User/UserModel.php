<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;

/**
 * Class UserModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserModel extends UsersUsersEntryModel implements UserInterface
{

    /**
     * Get the user's ID.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * Get the user's email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the user's username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the user's password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the related activation.
     *
     * @return mixed
     */
    public function getActivation()
    {
        return $this->activation;
    }

    /**
     * Get the related block.
     *
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Get the related profile.
     *
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Return the activation relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activation()
    {
        return $this->hasOne(config('module.users::config.activations.model'), 'user_id');
    }

    /**
     * Return the block relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function block()
    {
        return $this->hasOne(config('module.users::config.blocks.model'), 'user_id');
    }

    /**
     * Return the profile relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(config('module.users::config.profiles.model'), 'user_id');
    }
}
 