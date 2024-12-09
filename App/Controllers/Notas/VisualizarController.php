<?php

namespace App\Controllers\Notas;

class VisualizarController{
    public function mostrar(){
        session()->set('mostrar', true);

        redirect('/notas');
    }

    public function esconder(){
        session()->forget('mostrar');

        redirect('/notas');
    }
}