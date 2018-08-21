<?php

namespace SON\Db;

abstract class Table
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $query = "Select * from {$this->table}";
        
        return $this->db->query($query);
    }

    public function all()
    {
        $stmt = $this->db->prepare("Select * from {$this->table}");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $res;
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("Select * from {$this->table} where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $res = $stmt->fetch();

        return $res;
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("delete from {$this->table} where id=:id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}