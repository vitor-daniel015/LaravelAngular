<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Administradorontroller extends Controller
{

    function add(Request $dados) {
    // VALIDAÇÃO DOS DADOS
    $validator = Validator::make(
        $dados->all(),
        [
            'nome'        => 'required|string|min:3|max:255',
            'email'       => 'required|email|max:255',
            'telefone'    => 'required|string|max:11', 
            'cpf'         => 'required|string|max:14',
            'usuario'     => 'required|string|min:4|max:50',
            'senha'       => 'required|string|min:6|max:100',
            'status'      => 'required|boolean',
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
            'email.max'         => 'O email deve conter no máximo 255 caracteres.',
            
            // Telefone
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max'      => 'O telefone deve conter no máximo 11 caracteres.',
            
            // CPF
            'cpf.required'      => 'O campo CPF é obrigatório.',
            'cpf.max'           => 'O cpf deve conter no máximo 14 caracteres.',
            
            // Usuário
            'usuario.required'  => 'O campo usuário é obrigatório.',
            'usuario.min'       => 'O usuário deve conter no mínimo 4 caracteres.',
            'usuario.max'       => 'O usuário deve conter no máximo 50 caracteres.',
            
            // Senha
            'senha.required'    => 'O campo senha é obrigatório.',
            'senha.min'         => 'A senha deve conter no mínimo 6 caracteres.',
            'senha.max'         => 'A senha deve conter no máximo 100 caracteres.',
            
            // Status
            'status.required'   => 'O campo status é obrigatório.',
            'status.boolean'    => 'O status deve ser ativo ou inativo.',
        ]
    );

        if ($validator->fails()) {
            return response()->json($validator->fails());
        }

        $administrador = new \App\Models\AdministradorModel();
        $administrador::create($dados->all());

        $administradores = new \App\Models\AdministradorModel();

        return response()->json($administradores->all(), 200);
    }

        function remove(string $id) {
        $administrador = new \App\Models\AdministradorModel();
        $administrador::destroy($id);

		return response()->json(['success'=>'Removido!', 'administradores'=>$administrador::all()], 200);
    }

        function atualizar(Request $dados) {
		$administrador = new \App\Models\AdministradorModel();
        $administrador = $administrador::find($dados->id);
        
        $administrador->update($dados->all());

        return response()->json($administradores->all(), 200);
    }
}

