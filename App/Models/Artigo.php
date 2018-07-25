<?php

namespace App\Models;

class Artigo
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $query = "Select * from artigos";

        return $this->db->query($query);
    }
}