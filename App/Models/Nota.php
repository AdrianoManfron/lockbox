<?php

namespace App\Models;

use Carbon\Carbon;
use Core\DB;

class Nota
{
    public $id;

    public $usuario_id;

    public $titulo;

    public $nota;

    public $data_criacao;

    public $data_atualizacao;

    public function dataCriacao()
    {
        return Carbon::parse($this->data_criacao);
    }

    public function dataAtualizacao()
    {
        return Carbon::parse($this->data_atualizacao);
    }

    public function nota()
    {
        if (session()->get('mostrar')) {
            return decrypt($this->nota);
        }

        return str_repeat('*', rand(10, 200));
    }

    public static function all($pesquisar = null)
    {
        $db = new DB(config('database'));

        return $db->query(
            query: 'select * from notas where usuario_id = :usuario_id '.(
                $pesquisar ? 'and titulo like :pesquisar' : null
            ),
            class: self::class,
            params: array_merge(['usuario_id' => auth()->id], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])
        )->fetchAll();
    }

    public static function create($data)
    {
        $database = new DB(config('database'));

        $database->query(
            query: 'insert into notas( usuario_id, titulo, nota, data_criacao, data_atualizacao ) values( :usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao )',
            params: array_merge($data, [
                'data_criacao' => date('Y-m-d H:i:s'),
                'data_atualizacao' => date('Y-m-d H:i:s'),
            ])
        );
    }

    public static function update($id, $titulo, $nota)
    {
        $db = new DB(config('database'));

        $set = 'titulo = :titulo';
        if ($nota) {
            $set .= ', nota = :nota';
        }

        $db->query(
            query: "
                update notas
                set $set
                where id = :id
            ",
            params: array_merge([
                'id' => $id,
                'titulo' => $titulo,
            ], $nota ? ['nota' => encrypt($nota)] : [])
        );
    }

    public static function delete($id)
    {
        $db = new DB(config('database'));
        $db->query(
            query: '
                delete from notas
                where id = :id
            ',
            params: ['id' => $id]
        );
    }
}
