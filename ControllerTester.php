<?php

namespace BasicApp\Api;

trait ControllerTester
{

    public function withJsonBody($body)
    {
        return $this->withBody(json_encode($body));
    }

    public function withPost(array $post)
    {
        $request = new \CodeIgniter\HTTP\IncomingRequest(
            new \Config\App,
            new \CodeIgniter\HTTP\URI($this->appConfig->baseURL ?? 'http://example.com/'),
            null, // body
            new \CodeIgniter\HTTP\UserAgent
        );

        $request->setGlobal('post', $post);        

        return $this->withRequest($request);
    }

    public function executeJSON(string $action)
    {
        $result = $this->execute($action);

        $this->assertTrue($result->isOK(), '$result->isOK()');

        $body = json_decode($result->response()->getJSON(), true);

        $this->assertTrue(is_array($body), 'is_array($body)');

        return $body;
    }

}