<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Contract;

interface ActivationRepositoryInterface
{

    public function createActivation($userId);

    public function removeActivation($userId);

    public function complete($userId);

    public function forceActivation($userId);

    public function findByUserId($userId);

}
 