<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    function listar()
    {
        return response()->json([
            [
                "nome" => "Ana",
                "rm" => 123,
                "email" => "ana@hotmail.com"
            ],
            [
                "nome" => "Leo",
                "rm" => 456,
                "email" => "leo@hotmail.com"
            ],
            [
                "nome" => "Lauro",
                "rm" => 789,
                "email" => "laurodx@hotmail.com"
            ],
        ]);
    }

    function adicionar() {}

    function remove() {}

    function update() {}
}
