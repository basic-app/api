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

}