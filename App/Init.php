<?php

namespace App;

class Init
{

    private $routes;

    public function __construct()
    {
        $this->InitRoutes();
        $this->run($this->getUrl());
    }

    public function InitRoutes()
    {
        $ar['home'] = array(
            'route' => '/',
            'controller' => 'index',
            'action' => 'index'
        );

        $ar['empresa'] = array(
            'route' => '/empresa',
            'controller' => 'index',
            'action' => 'empresa'
        );

        $this->setRoutes($ar);

    }

    public function run($url)
    {
        array_walk($this->routes, function ($route) use ($url) {

            if($url == $route['route']) {
                $class = "App\\Controllers\\" . ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        });
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

}

