<?php
namespace App\ApiPrimeV2\DataHuman\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class EmployerController extends \Si\App\AbstractController
{
    public function getAction(int $id): ResponseInterface
    {
        $html = 'employer get V2';
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
