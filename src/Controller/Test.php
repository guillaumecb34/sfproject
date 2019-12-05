<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Test
 * @package App\Controller
 */
class Test
{
    /**
     * @Route("test/hello", name="test_hello")
     * @return Response
     */
    function maPageDeTest()
    {
        $response = new Response();

        $response->setContent("<html><body>Hello World</body></html>");
        $response->setStatusCode(200);

        return $response;
    }
}