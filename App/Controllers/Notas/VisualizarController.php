<?php

namespace App\Controllers\Notas;

use Core\Validacao;

class VisualizarController
{
    public function confirmar()
    {
        return view('notas/confirmar');
    }

    public function mostrar()
    {

        $validacao = Validacao::validar([
            'senha' => ['required'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('notas/confirmar');
        }

        if (! (password_verify($_POST['senha'], auth()->senha))) {
            flash()->push('validacoes', ['senha' => ['Sua senha está incorreta!']]);

            return view('notas/confirmar');
        }

        session()->set('mostrar', true);

        redirect('/notas');
    }

    public function esconder()
    {
        session()->forget('mostrar');

        redirect('/notas');
    }
}
