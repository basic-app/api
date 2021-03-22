<?php

namespace BasicApp\Api\Actions;

class ListAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            $elements = $this->findAllModel();

            return $this->respond([
                'elements' => $elements
            ]);
        };
    }

}