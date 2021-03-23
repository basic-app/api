<?php

namespace BasicApp\Api\Actions;

class NewAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            assert($this->model ? true : false);
            
            $data = $this->model->createEntity($this->request->getGet());

            return $this->respond([
                'data' => $data->toArray()
            ]);
        };
    }

}