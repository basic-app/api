<?php

namespace BasicApp\Api\Actions;

class NewAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            $data = $this->model->createEntity($this->request->getGet());

            return $this->respond([
                'data' => $data->toArray()
            ]);
        };
    }

}