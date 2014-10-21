<?php namespace Anomaly\Streams\Module\Users\Presenter;

use Streams\Core\Entry\Presenter\EntryPresenter;

class UserPresenter extends EntryPresenter
{
    public function name()
    {
        return "{$this->resource->first_name} {$this->resource->last_name}";
    }
}