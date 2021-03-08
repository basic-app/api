<?php

namespace BasicApp\Api\Actions;

class NewAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            $data = $this->model->createEntity($this->request->getGet());

            return $this->respond([
                'fields' => $data->toArray()
            ]);
        };
    }

}