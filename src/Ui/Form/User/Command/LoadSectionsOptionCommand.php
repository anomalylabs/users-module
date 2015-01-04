<?php namespace Anomaly\UsersModule\Ui\Form\User\Command;

use Illuminate\Support\Collection;

/**
 * Class LoadSectionsOptionCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form\User\Command
 */
class LoadSectionsOptionCommand
{

    /**
     * The form options.
     *
     * @var Collection
     */
    protected $options;

    /**
     * Create a new LoadSectionsOptionCommand instance.
     *
     * @param Collection $options
     */
    function __construct(Collection $options)
    {
        $this->options = $options;
    }

    /**
     * Get the form options.
     *
     * @return Collection
     */
    public function getOptions()
    {
        return $this->options;
    }
}
