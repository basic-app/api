<?php

namespace BasicApp\Api\Actions;

class ListAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            assert($this->model ? true : false);
            
            $elements = $this->modelFindAll();

            return $this->respond([
                'elements' => $elements
            ]);
        };
    }

}