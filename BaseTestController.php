<?php

namespace BasicApp\Api;

abstract class BaseTestController extends \Tests\Support\DatabaseTestCase
{

    use \CodeIgniter\Test\ControllerTester;

    use ControllerTester;

}