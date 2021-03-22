<?php

namespace BasicApp\Api\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;

class ShowAction extends BaseAction
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

            return $this->respond(['data' => $data->toArray()]);
        };
    }

}