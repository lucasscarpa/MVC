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
        $ar['usuariosCad'] = array('route' => '/usuarios/delete/{id}', 'controller' => 'usuario', 'action' => 'delete');


        $this->setRoutes($ar);
    }

    public static function getDb()
    {
        $db = new \PDO("mysql:host=localhost;dbname=crud_autodoc", "root", "root");
        return $db;

    }


}

