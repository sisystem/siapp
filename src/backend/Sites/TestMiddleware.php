<?php
namespace App\Sites;

use \Interop\Http\ServerMiddleware\MiddlewareInterface;
use \Interop\Http\ServerMiddleware\DelegateInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Zend\Diactoros\Response\HtmlResponse;
use \Psr\Http\Message\ResponseInterface;

class TestMiddleware implements MiddlewareInterface
{
    public function __construct($msg = "none")
    {
        $this->msg = $msg;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        var_dump(__CLASS__);
        var_dump($this->msg);
        return $delegate->process($request);
    }
}
