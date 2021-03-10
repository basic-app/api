<?php

namespace BasicApp\Api\Actions;

class ListAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            return $this->respond($this->model->findAll());
        };
    }

}