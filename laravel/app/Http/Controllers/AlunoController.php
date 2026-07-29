<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{

    function add(Request $dados) { 
        //VALIDAÇÃO DOS DADOS
        //mínimo 3 caracteres para o nome e é required (obrigatório)
        $validator = Validator::make(
            $dados->all(),
            [
                'nome'  => 'required|string|min:3|max:255',
            ],
            [
                // Nome
                'nome.required'     => 'O campo nome é obrigatório.',
                'nome.string'       => 'O nome deve ser um texto válido.',
                'nome.min'          => 'O nome deve conter no mínimo 3 caracteres.',
                'nome.max'          => 'O nome deve conter no máximo 255 caracteres.',
            ]
        );


        if ($validator->fails()) {
            return response()->json($validator->fails());
        }

        $aluno = new \App\Models\AlunoModel();
        $aluno::create($dados->all());

        $alunos = new \App\Models\AlunoModel();

        return response()->json($alunos->all(), 200);
    }

    function remove(string $id) {
        $aluno = new \App\Models\AlunoModel();
        $aluno::destroy($id);

				return response()->json(['success'=>'Removido!', 'alunos'=>$aluno::all()], 200);

    }

    function atualizar(Request $dados) {
		$aluno = new \App\Models\AlunoModel();
        $aluno = $aluno::find($dados->id);
        
        $aluno->update($dados->all());

        return response()->json($alunos->all(), 200);
    }


}
