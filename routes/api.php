<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
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

//------------------------------------------------------Cadastrar-------------------------------------------------

Route::post('adm/cadastrar/servico', [ServicoController::class, 'cadastrarServico']);

Route::post('adm/cadastrar/cliente', [ClientesController::class, 'cadastrarCliente']); 

Route::post('adm/cadastrar/profissional', [ProfissionalController::class, 'cadastrarProfissional']);

//------------------------------------------------------Update----------------------------------------------------
Route::put('adm/update/cliente', [ClientesController::class, 'editarCliente']);

Route::put('adm/update/profissional', [ProfissionalController::class, 'editarProfissional']);

Route::put('adm/update/servico', [ServicoController::class, 'editarServico']);

//------------------------------------------------------Visualizar--------------------------------------------------
Route::get('adm/all/cliente', [ClientesController::class, 'retornarTodosClientes']);

Route::get('adm/all/profissional', [ProfissionalController::class, 'retornarTodosProfissionais']);

Route::get('adm/all/servico', [ServicoController::class, 'retornarTodosServicos']);
//------------------------------------------------------Excluir--------------------------------------------------
Route::delete('adm/excluir/cliente/{id}', [ClientesController::class, 'excluirCliente']);

Route::delete('adm/excluir/profissional/{id}', [ProfissionalController::class, 'excluirProfissional']);

Route::delete('adm/excluir/servico/{id}', [ServicoController::class, 'excluirServico']);

//--------------------------------------------Pesquisas-Cliente-------------------------------------------------

Route::get('adm/pesquisar/nome/cliente', [ClientesController::class, 'pesquisarClientePorNome']);

Route::get('adm/pesquisar/cpf/cliente', [ClientesController::class, 'pesquisarClientePorCpf']);

Route::get('adm/pesquisar/celular/cliente', [ClientesController::class, 'pesquisarClientePorCelular']);

Route::get('adm/pesquisar/email/cliente', [ClientesController::class, 'pesquisarClientePorEmail']);

Route::get('adm/find/cliente/{id}',[ClientesController::class, 'pesquisarPorId']);
//------------------------------------------Pesquisas-Profissionais---------------------------------------------

Route::post('adm/pesquisar/nome/profissional', [ProfissionalController::class, 'pesquisarPorNomeProfissional']);

Route::post('adm/pesquisar/cpf/profissional', [ProfissionalController::class, 'pesquisarPorCpfProfissional']);

Route::post('adm/pesquisar/celular/profissional', [ProfissionalController::class, 'pesquisarPorCelularProfissional']);

Route::post('adm/pesquisar/email/profissional', [ProfissionalController::class, 'pesquisarPorEmailProfissional']);

Route::get('adm/find/profissional/{id}',[ProfissionalController::class, 'pesquisarPorId']);
//---------------------------------------------Pesquisas-Serviços----------------------------------------------

Route::get('adm/find/servico/{id}',[ServicoController::class, 'pesquisarPorId']);  

Route::post('adm/pesquisar/nome/servico', [ServicoController::class, 'pesquisarPorNome']);

Route::post('adm/pesquisar/descricao/servico', [ServicoController::class, 'pesquisarPorDescricao']);

