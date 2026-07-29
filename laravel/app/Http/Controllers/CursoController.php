<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{

    function add(Request $dados) { 
    // VALIDAÇÃO DOS DADOS
    $validator = Validator::make(
        $dados->all(),
        [
            'nome'        => 'required|string|min:3|max:255',
            'periodo'     => 'required|string|in:matutino,vespertino,noturno',
        ],
        [
            // Nome
            'nome.required'     => 'O campo nome é obrigatório.',
            'nome.string'       => 'O nome deve ser um texto válido.',
            'nome.min'          => 'O nome deve conter no mínimo 3 caracteres.',
            'nome.max'          => 'O nome deve conter no máximo 255 caracteres.',

            // Periodo
            'periodo.required'     => 'O campo periodo é obrigatório.',
            'periodo.string'       => 'O periodo deve ser um texto válido.',
            'periodo.in'           => 'O período aceita "matutino", "vespertino", "noturno" somente.',
        ]
    );

        if ($validator->fails()) {
            return response()->json($validator->fails());
        }

        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());
        
        $cursos = new \App\Models\CursoModel();
        
        return response()->json($cursos->all(), 200);
    }

    function remove(string $id) {
        $curso = new \App\Models\CursoModel();
        $curso::destroy($id);
        
        return response()->json(['success'=>'Removido!', 'cursos'=>$curso::all()], 200);
    }

    function atualizar(Request $dados) {
		$curso = new \App\Models\CursoModel();
        $curso = $curso::find($dados->id);
        
        $curso->update($dados->all());
        
        return response()->json($cursos->all(), 200);
    }

}
