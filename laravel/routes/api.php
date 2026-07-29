<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/aluno')->group(function(){
    Route::post('/add', [App\Http\Controllers\AlunoController::class, 'add'])->name('aluno.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AlunoController::class, 'remove'])->name('aluno.remove');
    Route::post('/atualizar', [App\Http\Controllers\AlunoController::class, 'atualizar'])->name('aluno.atualizar');
}); 

Route::prefix('/curso')->group(function(){
    Route::post('/add', [App\Http\Controllers\CursoController::class, 'add'])->name('curso.add');
    Route::get('/remove/{id}', [App\Http\Controllers\CursoController::class, 'remove'])->name('curso.remove');
    Route::post('/atualizar', [App\Http\Controllers\CursoController::class, 'atualizar'])->name('curso.atualizar');
}); 

Route::prefix('/professor')->group(function(){
    Route::post('/add', [App\Http\Controllers\ProfessorController::class, 'add'])->name('professor.add');
    Route::get('/remove/{id}', [App\Http\Controllers\ProfessorController::class, 'remove'])->name('professor.remove');
    Route::post('/atualizar', [App\Http\Controllers\ProfessorController::class, 'atualizar'])->name('professor.atualizar');
}); 

Route::prefix('/componente')->group(function(){
    Route::post('/add', [App\Http\Controllers\ComponenteController::class, 'add'])->name('componente.add');
    Route::get('/remove/{id}', [App\Http\Controllers\ComponenteController::class, 'remove'])->name('componente.remove');
    Route::post('/atualizar', [App\Http\Controllers\ComponenteController::class, 'atualizar'])->name('componente.atualizar');
}); 

Route::prefix('/administrador')->group(function(){
    Route::post('/add', [App\Http\Controllers\AdministradorController::class, 'add'])->name('administrador.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AdministradorController::class, 'remove'])->name('administrador.remove');
    Route::post('/atualizar', [App\Http\Controllers\AdministradorController::class, 'atualizar'])->name('administrador.atualizar');
}); 