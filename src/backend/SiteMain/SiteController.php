<?php
namespace App\SiteMain;

use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class SiteController extends \Si\App\AbstractController
{
    public function indexAction(): ResponseInterface
    {
        $html = 'SiteMain::indexAction';
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
