<?php

namespace App\Models\Usuario;

use SON\Db\Table;
use App\Init;

class Usuario extends Table
{

    protected $table = "usuario";

    /**
     * Retorna as obras de um usuário
     */
    public function getObra($usuario)
    {
        $usuario['obra'] = [];

        $sql = "SELECT o.nome FROM obra o
                LEFT JOIN usuario_obra uo ON o.id = uo.obra_id
                LEFT JOIN usuario u on u.id = uo.usuario_id
                WHERE u.id = :id";


        $PDO =  Init::getDb();

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam('id', $usuario['id']);
        $stmt->execute();

        $obras = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        $usuario['obra'] = implode(', ', $obras);

        return $usuario;
    }
}