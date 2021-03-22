<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class DeleteAction extends BaseAction
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

            $primaryKey = $this->model->primaryKey;

            $result = $this->deleteModel($data->$primaryKey);

            assert($result);

            return $this->respondDeleted([
                'code' => $this->codes['deleted'],
                'message' => "DELETED"
            ]);
        };
    }

}