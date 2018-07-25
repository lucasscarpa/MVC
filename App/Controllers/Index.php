<?php

namespace App\Controllers;

use SON\Controller\Action;
use App\Models\Artigo;

class Index extends Action
{

    public function index()
    {
        $artigo = new Artigo(\App\Init::getDb());
        $artigos = $artigo->fetchAll();

        $this->view->artigos = $artigos;

        $this->render('index');
    }

    public function empresa()
    {
        $this->render('empresa');
    }

}