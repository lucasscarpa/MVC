<?php

namespace App;

use SON\Init\Bootstrap;

class Init extends Bootstrap
{

    protected function initRoutes()
    {
        $ar['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
        $ar['empresa'] = array('route' => '/empresa', 'controller' => 'index', 'action' => 'empresa');
        $ar['obras'] = array('route' => '/obras', 'controller' => 'obra', 'action' => 'index');
        $ar['usuarios'] = array('route' => '/usuarios', 'controller' => 'usuario', 'action' => 'index');
        $ar['usuarioDelete'] = array('route' => '/usuarios/delete/{id}', 'controller' => 'usuario', 'action' => 'delete');
        $ar['usuarioForm'] = array('route' => '/usuarios/form', 'controller' => 'usuario', 'action' => 'form');
        $ar['usuarioEdit'] = array('route' => '/usuarios/form/{id}', 'controller' => 'usuario', 'action' => 'form');


        $this->setRoutes($ar);
    }

    public static function getDb()
    {
        try {
            $db = new \PDO("mysql:host=localhost;dbname=crud_autodoc", "root", "root");
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $db;

    }


}

