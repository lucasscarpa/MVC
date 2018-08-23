<?php

namespace App\Controllers;

use App\Init;
use SON\Controller\Action;
use SON\Di\Container;

class Usuario extends Action
{
    public function index()
    {
        $usuarioModel = Container::getClass("Usuario");
        $usuarioLista = $usuarioModel->all();
        
        foreach($usuarioLista as &$usuario)
        {
            $usuario = $usuarioModel->getObra($usuario);
        }

        $this->view->usuarios = $usuarioLista;
        $this->render('index');
    }

    public function delete($id)
    {
        $usuarioModel = Container::getClass("Usuario");
        $usuarioModel = $usuarioModel->delete($id);

        $this->view->menssagem = 'Usuário excluido com sucesso!';
        $this->index();
        
    }

    public function form($id = null)
    {
        if(!$id) {
            return $this->cadastrar();
        }

        return $this->editar();
    }

    public function cadastrar()
    {
        echo 'Cadastrar';
    }

    public function editar()
    {
        echo 'Editar';
    }

}