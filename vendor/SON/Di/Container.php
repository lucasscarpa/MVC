<?php

namespace SON\Di;


class Container
{
    public static function getClass($name)
    {

        $str_class = "\\App\\Models\\".ucfirst($name)."\\".ucfirst($name);

        $class = new $str_class(\App\Init::getDb());
        return $class;
    }

}