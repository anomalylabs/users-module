<?php namespace Anomaly\Streams\Addon\Module\Users\Extension;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionAddon;

/**
 * Class CheckExtension
 *
 * Check extensions perform security checks at login,
 * checking authorization and login failures.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Extension
 */
class CheckExtension extends ExtensionAddon
{

    /**
     * Return the handler class.
     *
     * @return null|string
     */
    public function toHandler()
    {
        return $this->transform(__FUNCTION__);
    }
}
 