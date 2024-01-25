<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoUpdateFormRequest;
use App\Http\Requests\PagamntoFormRequest;
use App\Http\Requests\ServicoUpdateFormRequest;
use App\Models\Pagamento;
use App\Models\Servico;
use Illuminate\Http\Request;

class Tipo_PagamentoController extends Controller
{
    public function cadastrarPagamento(PagamntoFormRequest $request)
    {

        $servico = Servico::create([
            'nome' => $request->nome,
        ]);
        return response()->json([
            "status" => true,
            "message" => "Serviço Cadastrado com sucesso",
            "data" => $servico

        ], 200);
    }



    public function retornarTodosPagamnto()
    {
        $pagamento = Pagamento::all();
        if (isset($pagamento)) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => 'Não há nenhum registro no sistema!'
        ]);
    }

    public function editarPagamento(PagamentoUpdateFormRequest $request)
    {
        $pagamento = Pagamento::find($request->id);
        if (!isset($pagamento)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não Sencontrado"
            ]);
        }

        if (isset($request->nome)) {
            $pagamento->nome = $request->nome;
        }

        $pagamento->update();

        return response()->json([
            'status' => true,
            'message' => 'pagamento atualizado.'
        ]);
    }

    public function excluirPagamento($id)
    {
        $pagamento = Pagamento::find($id);

        if (!isset($pagamento)) {
            return response()->json([
                'status' => false,
                'message' => "pagamento não encontrado"
            ]);
        }

        $pagamento->delete();
        return response()->json([
            'status' => true,
            'message' => "pagamento excluido com sucesso!"
        ]);
    }


    //Pesquisas


    public function pesquisarPorNome(Request $request)
    {
        $pagamento = Pagamento::where('nome', 'like', '%' . $request->nome . '%')->get();


        if (count($pagamento) > 0) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "pagamento não encontrado"
        ]);
    }

   
}


