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

            $body = $this->request->getJSON(true);

            $data->fill($body);

            if ($this->model->save($data->toArray()))
            {
                $id = $this->model->insertID();

                assert($id ? true : false);

                $data = $this->model->find($id);

                assert($data ? true : false);

                return $this->respondCreated([
                    'insertID' => $id,
                    'data' => $data->toArray()
                ]);
            }
        
            return $this->respond([
                'data' => $data->toArray(),
                'validationErrors' => (array) $this->model->errors(),
                'errors' => $errors
            ], $this->codes['invalid_data']);
        };
    }

}