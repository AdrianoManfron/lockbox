<?php

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class DeleteController{
    public function __invoke()
    {

        $validacao = Validacao::validar([
            'id' => ['required']
        ], request()->all());

        if ($validacao->naoPassou()) {
            return redirect('/notas?id=' . request()->post('id'));
        }

        Nota::delete(request()->post('id'));

        flash()->push('mensage', 'Registro deletado com sucesso!');
        redirect('/notas');
    }
}