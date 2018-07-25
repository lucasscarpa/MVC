<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\Di\Container;

class Index extends Action
{

    public function index()
    {
        $usuario = Container::getClass("Usuario");
        $usuarios = $usuario->fetchAll();

        $this->view->usuarios = $usuarios;
        $this->render('index');
    }

    public function empresa()
    {

        $obra = Container::getClass("Obra");
        $obras = $obra->fetchAll();

        $this->view->obras = $obras;

        $this->render('empresa');
    }

}