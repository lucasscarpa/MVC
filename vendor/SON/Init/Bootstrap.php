<?php

namespace SON\Init;

abstract class Bootstrap
{

    private $routes;

    public function __construct()
    {
        $this->InitRoutes();
        $this->run($this->getUrl());
    }

    abstract protected function InitRoutes();

    protected function run($url)
    {
        array_walk($this->routes, function ($route) use ($url) {
            echo '<pre>';

            if(preg_match('/\{(.*?)\}/', $route['route'])) {
                $urlArray = explode('/', $url);
                $variavel = array_pop($urlArray);
                $url = $urlArray;
                var_dump($url);
                exit;
            }

            if($url == $route['route']) {
                echo 'oi';
                $class = "App\\Controllers\\" . ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                isset($variavel) ? $controller->$action($variavel) : $controller->$action();
            }
        });
    }

    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}