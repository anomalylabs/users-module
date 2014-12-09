<?php namespace Anomaly\Streams\Addon\Module\Users\Addon\FieldType;

use Anomaly\Streams\Addon\FieldType\Text\TextFieldType;

/**
 * Class PasswordTextFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Addon\FieldType
 */
class PasswordTextFieldType extends TextFieldType
{

    /**
     * Get view data for the input view.
     *
     * @return array
     */
    public function getInputData()
    {
        $data = parent::getInputData();

        $data['type']  = 'password';
        $data['value'] = null;

        return $data;
    }
}
 