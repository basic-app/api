<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class ShowAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            if ($this->model->allowedFields)
            {
                $this->model->select($this->model->allowedFields);
            }

            $data = $this->model->find((int) $id);

            if (!$data)
            {
                return $this->failNotFound();
            }

            return $this->respond(['data' => $data->toArray()]);
        };
    }

}