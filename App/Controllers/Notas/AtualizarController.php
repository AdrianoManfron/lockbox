<?php

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class AtualizarController{
    public function __invoke()
    {

        $validacao = Validacao::validar([
            'id' => ['required'],
            'titulo' => ['required', 'min:5', 'max:255'],
            'nota' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return redirect('/notas?id=' . request()->post('id'));
        }

        Nota::update(
            request()->post('id'),
            request()->post('titulo'),
            request()->post('nota'),
        );

        flash()->push('mensage', 'Registro atualizado com sucesso!');
        redirect('/notas');
    }
}