<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class DeleteAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            assert($id ? true : false);

            $data = $this->model->find($id);

            if (!$data)
            {
                return $this->failNotFound();
            }

            $result = $this->model->deleteEntity($data);

            assert($result);

            return $this->respondDeleted([
                'code' => $this->codes['deleted'],
                'message' => "DELETED"
            ]);
        };
    }

}