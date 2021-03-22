<?php

namespace BasicApp\Api;

use BasicApp\Action\ActionsTrait;

class BaseApiController extends \CodeIgniter\RESTful\ResourceController
{

    use ActionsTrait;

    const ACTION_CREATE = 'BasicApp\Api\Actions\CreateAction';

    protected $format = 'json';

    protected $defaultActions = [
        'index' => 'BasicApp\Api\Actions\ListAction',
        'new' => 'BasicApp\Api\Actions\NewAction',
        'create' => 'BasicApp\Api\Actions\CreateAction',
        'show' => 'BasicApp\Api\Actions\ShowAction',
        'update' => 'BasicApp\Api\Actions\UpdateAction',
        'edit' => 'BasicApp\Api\Actions\EditAction',
        'delete' => 'BasicApp\Api\Actions\DeleteAction'
    ];

    protected function saveModel($data) : bool
    {
        return $this->model->save($data);
    }

    protected function findModel($id = null)
    {
        return $this->model->find($id);
    }

    protected function findAllModel(int $limit = 0, int $offset = 0)
    {
        return $this->model->findAll($limit, $offset);
    }

    public function deleteModel($id = null, bool $purge = false)
    {
        return $this->model($id, $purge);
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return $this->remapAction('index');
    }

    /**
     * Return the properties of a resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return $this->remapAction('show', $id);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return $this->remapAction('new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        return $this->remapAction('create');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return $this->remapAction('edit', $id);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        return $this->remapAction('update', $id);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        return $this->remapAction('delete', $id);
    }

}