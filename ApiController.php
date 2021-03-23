<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Api;

use BasicApp\Action\ActionControllerTrait;
use BasicApp\Model\ModelControllerTrait;

class ApiController extends \CodeIgniter\RESTful\ResourceController
{

    use ActionControllerTrait;
    
    use ModelControllerTrait;

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