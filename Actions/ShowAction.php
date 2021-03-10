<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class ShowAction extends \BasicApp\Action\BaseAction
{

    public function _remap($method, ...$params)
    {
        return function($method, $id)
        {
            $data = $this->model->find((int) $id);

            if (!$data)
            {
                throw PageNotFoundException::forPageNotFound();
            }

            return $this->respond(['data' => $data->toArray()]);
        };
    }

}