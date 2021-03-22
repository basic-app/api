<?php

namespace BasicApp\Api\Actions;

class UpdateAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            assert($id ? true : false);

            $data = $this->findModel($id);

            if (!$data)
            {
                return $this->failNotFound();
            }

            $validationErrors = [];

            $errors = [];

            $body = $this->request->getJSON(true);

            $data->fill($body);

            if ($this->saveModel($data->toArray()))
            {
                $data = $this->findModel($id);

                assert($data ? true : false);

                return $this->respondUpdated([
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