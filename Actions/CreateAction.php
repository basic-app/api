<?php

namespace BasicApp\Api\Actions;

class CreateAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            return get_class($this);
        };
    }

}