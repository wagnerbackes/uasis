<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/u', 'UsuariosController@listarUsuarios');
// use App\Http\Controllers\UsuariosController;
Route::get('usuarios',[UsuariosController::class, 'index']);
Route::get('usuarios/novo',[UsuariosController::class, 'create']);


// use App\Http\Controllers\UsuariosController;
Route::get('alunos',[UsuariosController::class, 'index']);
Route::get('alunos/novo',[UsuariosController::class, 'create']);

use App\Http\Controllers\AlunosController;
Route::get('alunos',[AlunosController::class, 'index'])->name('listar_alunos');
Route::get('alunos/novo',[AlunosController::class, 'create'])->name('form_criar_aluno');
Route::post('alunos/novo',[AlunosController::class, 'store'])->name('salvar_aluno');
Route::delete('alunos/{ra}',[AlunosController::class, 'destroy'])->name('excluir_aluno');


use App\Http\Controllers\CursosController;
Route::get('cursos',[CursosController::class, 'index'])->name('listar_cursos');
Route::get('cursos/novo',[CursosController::class, 'create'])->name('form_criar_curso');
Route::post('cursos/novo',[CursosController::class, 'store'])->name('salvar_curso');
Route::delete('cursos/{id}',[CursosController::class, 'destroy'])->name('excluir_curso');


use App\Http\Controllers\EntrarController;
Route::get('/',[EntrarController::class, 'entrar']);
Route::get('entrar',[EntrarController::class, 'index'])->name('form_loggin');
Route::post('entrar',[EntrarController::class, 'entrar'])->name('loggin');


use App\Http\Controllers\UsuariosController;
Route::get('usuarios',[UsuariosController::class, 'index'])->name('listar_usuarios');
Route::get('usuarios/novo',[UsuariosController::class, 'create'])->name('form_usuarios');
Route::post('usuarios/novo',[UsuariosController::class, 'store'])->name('salvar_usuarios');
Route::delete('usuarios/{id}',[UsuariosController::class, 'destroy'])->name('excluir_usuarios');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
