<?php
namespace App\Sites;

use \Interop\Http\ServerMiddleware\MiddlewareInterface;
use \Interop\Http\ServerMiddleware\DelegateInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Zend\Diactoros\Response\HtmlResponse;
use \Psr\Http\Message\ResponseInterface;

class ResponseMiddleware implements MiddlewareInterface
{
    public function __construct($msg = "none")
    {
        $this->msg = $msg;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        var_dump(__CLASS__);
        var_dump($this->msg);
        $html = 'response middleware';
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
