<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Retorna todas as transações do usuário logado
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();
        return response()->json($transactions, 200);
    }

    /**
     * Cria uma nova transação
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $amount = $request->input('amount');
        $total_amount = $amount * 100;
        $request->merge([
            'amount' => $total_amount
        ]);

        //Verifica se foi uma receita (positivo) ou uma despesa (negativo)
        if($request->input('amount') > 0){
           $user->total_amount += $total_amount;
        } else {
            $user->total_amount -= $total_amount;
        }

        $user->save();

        $transaction = $user->transactions()->create($request->all());
        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
