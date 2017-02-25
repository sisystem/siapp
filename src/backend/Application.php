<?php
namespace App;

use \Equip\Dispatch\MiddlewarePipe;

class Application extends \Si\App\AbstractApplication
{
    public function __construct()
    {
        echo "[constructing Application]";

        $this->set([
            new \App\Sites\TestMiddleware("before"),
            new \Si\App\Router(),
        ]);

        $this->setAfter([
            new \App\Sites\TestMiddleware("after1"),
            new \App\Sites\LastMiddleware("after2"),
        ]);
    }
}
