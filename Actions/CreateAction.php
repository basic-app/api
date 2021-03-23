<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Api\Actions;

class CreateAction extends BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method)
        {
            assert($this->model ? true : false);

            $data = $this->model->createEntity($this->request->getGet());

            $validationErrors = [];

            $errors = [];

            $body = $this->request->getJSON(true);

            $data->fill($body);

            if ($this->modelSave($data->toArray()))
            {
                $id = $this->modelInsertID();

                assert($id ? true : false);

                $data = $this->modelFind($id);

                assert($data ? true : false);
            
                return $this->respondCreated([
                    'insertID' => $id,
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