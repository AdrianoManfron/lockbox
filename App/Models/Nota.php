<?php

namespace App\Models;

use Core\DB;

class Nota{
    public $id;
    public $usuario_id;
    public $titulo;
    public $nota;
    public $data_criacao;
    public $data_atualizacao;

    public static function all($pesquisar = null){
        $db = new DB(config('database'));

        return $db->query(
            query: "select * from notas where usuario_id = :usuario_id " . (
                $pesquisar ? "and titulo like :pesquisar" : null
            ),
            class: self::class,
            params: array_merge(['usuario_id' => auth()->id,], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])
        )->fetchAll();
    }

    public static function update($id, $titulo, $nota){
        $db = new DB(config('database'));
        $db->query(
            query: "
                update notas
                set titulo = :titulo,
                nota = :nota
                where id = :id
            ",
            params: [
                'id' => $id,
                'titulo' => $titulo,
                'nota' => $nota
            ]
        );
    }

    public static function delete($id){
        $db = new DB(config('database'));
        $db->query(
            query: "
                delete from notas
                where id = :id
            ",
            params: ['id' => $id]
        );
    }
}