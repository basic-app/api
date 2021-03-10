<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class DeleteAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            $data = $this->model->find($id);

            if (!$data)
            {
                throw PageNotFoundException::forPageNotFound();
            }

            $result = $this->model->deleteEntity($data);

            return $this->respond(['result' => $result]);
        };
    }

}