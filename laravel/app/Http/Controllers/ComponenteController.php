<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponenteController extends Controller
{

    function add(Request $dados) {
        //VALIDAÇÃO DOS DADOS
        $validator = Validator::make(
            $dados->all(),
            [
                'nome'        => 'required|string|min:3|max:255',
                'hora_inicio' => 'required|date_format:Y-m-d H:i:s',
                'hora_fim' => 'required|date_format:Y-m-d H:i:s',
            ],
            [
                // Nome
                'nome.required'     => 'O campo nome é obrigatório.',
                'nome.string'       => 'O nome deve ser um texto válido.',
                'nome.min'          => 'O nome deve conter no mínimo 3 caracteres.',
                'nome.max'          => 'O nome deve conter no máximo 255 caracteres.',

                // Hora_incio
                'hora_inicio.required' => 'O campo Data Inicio é obrigatório.',
                'hora_inicio.date_format' => 'Deve ser uma data.',

                // Hora_fim
                'hora_fim.required' => 'O campo Data Fim é obrigatório.',
                'hora_fim.date_format' => 'Deve ser uma data.',
            ]
        );

            if ($validator->fails()) {
            return response()->json($validator->fails());
        }

        $componente = new \App\Models\ComponenteModel();
        $componente::create($dados->all());
        
        $componentes = new \App\Models\ComponenteModel();
        
        return response()->json($componentes->all(), 200);
    }

    function remove(string $id) {
        $componente = new \App\Models\ComponenteModel();
        $componente::destroy($id);
        
		return response()->json(['success'=>'Removido!', 'componentes'=>$componente::all()], 200);
    }

    function atualizar(Request $dados) {
		$componente = new \App\Models\ComponenteModel();
        $componente = $componente::find($dados->id);
        
        $componente->update($dados->all());
        
        return response()->json($componentes->all(), 200);
    }

}
