<?php

namespace BasicApp\Api;

class BaseController extends \CodeIgniter\RESTful\ResourceController
{

    use ListOperationTrait {
        list as index;
    }

    use NewOperationTrait;

    use CreateOperationTrait;

    use ShowOperationTrait;

    use EditOperationTrait;

    use UpdateOperationTrait;

    use DeleteOperationTrait;

}