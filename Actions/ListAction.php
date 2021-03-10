<?php

namespace BasicApp\Api\Actions;

class ListAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            if ($this->model->allowedFields)
            {
                $this->model->select($this->model->allowedFields);
            }

            $elements = $this->model->findAll();

            return $this->respond([
                'elements' => $elements
            ]);
        };
    }

}