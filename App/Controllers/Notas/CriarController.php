<?php

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return view('notas/criar');
    }

    public function store()
    {
        $validacao = Validacao::validar([
            'titulo' => ['required', 'min:5', 'max:255'],
            'nota' => ['required'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('notas/criar');
        }

        Nota::create([
            'usuario_id' => auth()->id,
            'titulo' => request()->post('titulo'),
            'nota' => encrypt(request()->post('nota')),
        ]);

        flash()->push('mensage', 'Nota criada com sucesso!');
        redirect('/notas');
    }
}
