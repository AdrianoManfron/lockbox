<?php

namespace App\Controllers;

use App\Models\Usuario;
use Core\DB;
use Core\Validacao;

class LoginController
{
    public function index()
    {
        return view('login', template: 'guest');
    }

    public function Login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'senha' => ['required'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('login', template: 'guest');
        }

        $database = new DB(config('database'));

        $usuario = $database->query(
            query: 'select * from usuarios where email = :email',
            class: Usuario::class,
            params: compact('email'))->fetch();

        if (! ($usuario && password_verify($senha, $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['Usuário ou senha estão incorretos!']]);

            return view('login', template: 'guest');
        }

        $_SESSION['auth'] = $usuario;

        flash()->push('mensage', 'Seja bem vindo '.$usuario->nome.'!');

        redirect('/notas');
    }
}
