<?php namespace Anomaly\UsersModule\User\Command;

use Anomaly\Streams\Platform\Addon\Plugin\PluginForm;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\UsersModule\User\Reset\CompleteResetFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

/**
 * Class BuildCompleteResetForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class BuildCompleteResetForm implements SelfHandling
{

    /**
     * The form parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new BuildCompleteResetForm instance.
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
     * @param Request    $request
     * @param Encrypter  $encrypter
     * @param Decorator  $decorator
     * @return \Anomaly\Streams\Platform\Ui\Form\FormBuilder
     */
    public function handle(PluginForm $form, Request $request, Encrypter $encrypter, Decorator $decorator)
    {
        $code  = $encrypter->decrypt($request->get('code'));
        $email = $encrypter->decrypt($request->get('email'));

        $parameters = array_merge_recursive(
            $this->parameters,
            [
                'code'    => $code,
                'email'   => $email,
                'builder' => CompleteResetFormBuilder::class
            ]
        );

        return $decorator->decorate($form->make($parameters)->getForm());
    }
}
