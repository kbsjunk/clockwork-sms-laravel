<?php namespace Kitbs\Clockwork\Facades;

use Illuminate\Support\Facades\Facade;

class ClockworkFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'clockwork-sms'; }

}