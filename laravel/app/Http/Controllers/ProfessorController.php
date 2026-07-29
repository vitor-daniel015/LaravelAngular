<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{

    function add(Request $dados) {
    // VALIDAÇÃO DOS DADOS
    $validator = Validator::make(
        $dados->all(),
        [
            'nome'        => 'required|string|min:3|max:255',
            'email'       => 'required|email|max:255',
            'telefone'    => 'required|string|max:11',
            // 15998571316
        ],
        [
            // Nome
            'nome.required'     => 'O campo nome é obrigatório.',
            'nome.string'       => 'O nome deve ser um texto válido.',
            'nome.min'          => 'O nome deve conter no mínimo 3 caracteres.',
            'nome.max'          => 'O nome deve conter no máximo 255 caracteres.',
            
            // Email
            'email.required'    => 'O campo e-mail é obrigatório.',
            'email.email'       => 'Insira um endereço de e-mail válido.',
            'email.max'          => 'O email deve conter no máximo 255 caracteres.',
            
            // Telefone
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max'          => 'O telefone deve conter no máximo 11 caracteres.',
        ]
    );

        if ($validator->fails()) {
            return response()->json($validator->fails());
        }

        $professor = new \App\Models\ProfessorModel();
        $professor::create($dados->all());

        $professores = new \App\Models\ProfessorModel();

        return response()->json($professores->all(), 200);
    }

    function remove(string $id) {
        $professor = new \App\Models\ProfessorModel();
        $professor::destroy($id);

		return response()->json(['success'=>'Removido!', 'professores'=>$professor::all()], 200);

    }

    function atualizar(Request $dados) {
		$professor = new \App\Models\ProfessorModel();
        $professor = $professor::find($dados->id);
        
        $professor->update($dados->all());

        return response()->json($professores->all(), 200);
    }


}
