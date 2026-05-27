<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function listar()
    {
        return response()->json([
                "nome" => "Diogo",
                "cpf" => "123.123.123-45",
                "email" => "Diogo@hotmail.com"
            ],
            [
                "nome" => "Amaury",
                "cpf" => "456.456.456-45",
                "email" => "maumaudomal@hotmail.com"
            ],
            [
                "nome" => "Bruno",
                "cpf" => "999.999.999-45",
                "email" => "brunao@hotmail.com"
            ],);
    }

    function adicionar() {}

    function remove() {}

    function update() {}
}
