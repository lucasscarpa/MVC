<?php

namespace App\Controllers;

use App\Init;
use SON\Controller\Action;
use SON\Di\Container;

class Usuario extends Action
{
    public function index()
    {
        $usuario['obra'] = [];
        $usuario = Container::getClass("Usuario");
        $usuarios = $usuario->all();
        
        foreach($usuarios as &$usuario)
        {
            $usuario->getObra($usuario['id']);
        }

        $this->view->usuarios = $usuarios;


        $this->render('index');
    }

}