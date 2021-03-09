<?php

namespace BasicApp\Api\Actions;

class CreateAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            $data = $this->model->createEntity($this->request->getGet());

            $validationErrors = [];

            $errors = [];

            $data->fill($this->request->getPost());

            if ($this->model->save($data->toArray()))
            {
                return $this->respond([
                    'insertID' => $this->model->insertID()
                ]);
            }
        
            return $this->respond([
                'data' => $data->toArray(),
                'validationErrors' => (array) $this->model->errors(),
                'errors' => $errors
            ]);
        };
    }

}