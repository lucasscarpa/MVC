<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\Di\Container;

class Obra extends Action
{
    public function index()
    {
        $obra = Container::getClass("Obra");
        $obras = $obra->fetchAll();
        $this->view->obras = $obras;
        $this->render('index');
    }

}