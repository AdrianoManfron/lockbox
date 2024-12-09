<?php

namespace App\Controllers;

use Core\Validacao;
use Core\DB;

class RegisterController
{

    public function index()
    {
        return view('registrar', template: 'guest');
    }


    public function Register()
    {
        $validacao = Validacao::validar([
            'nome' => ['required'],
            'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
            'senha' => ['required', 'min:8', 'max:30', 'strong']
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('registrar', template: 'guest');
        }

        $database = new DB(config('database'));

        $database->query(
            query: "insert into usuarios ( nome, email, senha ) values ( :nome, :email, :senha )",
            params: [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
            ]
        );

        flash()->push('mensage', 'Registrado com sucesso!');
        redirect('/login');
    }
}
