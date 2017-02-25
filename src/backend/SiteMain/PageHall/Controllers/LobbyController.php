<?php
namespace App\SiteMain\PageHall\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class LobbyController extends \Si\App\AbstractController
{
    public function indexAction()
    {
        $html = 'lobby index action';
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }

    public function testTestAction($par1 = null, $par2 = null, $par3 = null)
    {
        (\Si\App\Ctx::tpl_loader())->addPath("src/backend/SiteMain/PageHall/views");
        $twig = \Si\App\Ctx::tpl_engine();

        //throw new \Exception('test');

        $debugbarRenderer = null;
        if (\Si\App\Ctx::env() === "dev") {
            // temporary
            // - when assets manager in place we need to use it, see debugbar docs 'rendering'
            // - when router/renderer or abstracMiddleware on place this will go to common place (for 'dev' environment only)
            // now there is symlink in 'public' directory
            $debugbarRenderer = \Si\App\Ctx::register('debugbar')->getJavascriptRenderer();
            $debugbarRenderer->setBaseUrl("debugbar_resources");
        }


        $html = $twig->render('lobby.html.twig', [
            'debugbarRenderer' => $debugbarRenderer,
        ]);

        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);

        $html = 'lobby test action';
        return new HtmlResponse($html, 200, ["X-Show-Something" => "something showed by header"]);
    }
}
