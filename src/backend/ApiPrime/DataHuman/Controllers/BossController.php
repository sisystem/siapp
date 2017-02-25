<?php
namespace App\ApiPrime\DataHuman\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class BossController extends \Si\App\AbstractController
{
    public function someAction(int $id = null): ResponseInterface
    {
        $html = 'boss some: ' . var_export($id, true);
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
