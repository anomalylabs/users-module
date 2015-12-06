<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\Streams\Platform\Addon\Plugin\PluginForm;
use Anomaly\UsersModule\User\Reset\ResetFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class BuildResetForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class BuildResetForm implements SelfHandling
{

    /**
     * The form parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new BuildResetForm instance.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @param PluginForm $form
     * @return \Anomaly\Streams\Platform\Ui\Form\FormBuilder
     */
    public function handle(PluginForm $form)
    {
        $parameters = array_merge_recursive($this->parameters, ['builder' => ResetFormBuilder::class]);

        return $form->make($parameters)->getForm();
    }
}
