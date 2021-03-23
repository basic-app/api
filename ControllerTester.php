<?php
/**
 * @author basic-app <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Api;

trait ControllerTester
{

    public function withJSON($body)
    {
        return $this->withBody(json_encode($body));
    }

    public function withPost(array $post)
    {
        $body = null;

        $request = new \CodeIgniter\HTTP\IncomingRequest(
            new \Config\App,
            new \CodeIgniter\HTTP\URI($this->appConfig->baseURL ?? 'http://example.com/'),
            $body,
            new \CodeIgniter\HTTP\UserAgent
        );

        $request->setGlobal('post', $post);        

        return $this->withRequest($request);
    }

    public function getJSON($result)
    {
        $json = $result->response()->getJSON();

        $this->assertNotEmpty($json);

        return json_decode($json, true, 512, JSON_THROW_ON_ERROR); // php 7.3
    }

    public function assertStatusCode($code, $result)
    {
        $this->assertEquals(400, $result->response()->getStatusCode());
    }

}