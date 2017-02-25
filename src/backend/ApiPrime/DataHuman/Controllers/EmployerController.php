<?php
namespace App\ApiPrime\DataHuman\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class EmployerController extends \Si\App\AbstractController
{
    public function __invoke()
    {
        $this->setGeneral([
            new \App\Sites\TestMiddleware("ctrl ALL 1"),
            new \App\Sites\TestMiddleware("ctrl ALL 2"),
            new \App\Sites\ResponseMiddleware("ctrl Action 1 response"),
        ]);
    }

    public function getAction(int $id): ResponseInterface
    {
        return $this->reroute("\App\ApiPrime\DataHuman\Controllers\BossController", "someAction", [$id]);
        $this->setSpecific([
            new \App\Sites\TestMiddleware("ctrl Action 2"),
        ]);
        $response = $this->dispatch();
        return $response;
        //$html = 'employer get';
        //return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
