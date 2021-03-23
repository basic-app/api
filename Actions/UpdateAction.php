<?php

namespace BasicApp\Api\Actions;

class UpdateAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            assert($this->model ? true : false);
            
            assert($id ? true : false);

            $data = $this->modelFind($id);

            if (!$data)
            {
                return $this->failNotFound();
            }

            $validationErrors = [];

            $errors = [];

            $body = $this->request->getJSON(true);

            $data->fill($body);

            if ($this->modelSave($data->toArray()))
            {
                $data = $this->modelFind($id);

                assert($data ? true : false);

                return $this->respondUpdated([
                    'data' => $data->toArray()
                ]);
            }
        
            return $this->respond([
                'data' => $data->toArray(),
                'validationErrors' => (array) $this->modelErrors(),
                'errors' => $errors
            ], $this->codes['invalid_data']);
        };
    }

}