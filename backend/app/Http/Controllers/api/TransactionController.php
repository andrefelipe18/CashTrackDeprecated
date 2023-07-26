<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

        if($request->input('category_id') == 1){
            $user->total_amount = $user->total_amount + $total_amount;
        }else{
            $user->total_amount = $user->total_amount - $total_amount;
        }

        $user->save();

        $transaction = $user->transactions()->create($request->all());
        return response()->json($transaction);
    }

    public function monthlyTransactions(Request $request)
    {
        $user = $request->user();

        $transactions = [
            'incomes' => [],
            'expenses' => []
        ];


        $first_day = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
        $last_day = Carbon::now()->lastOfMonth()->format('Y-m-d H:i:s');

        $incomes = $user->transactions()->where('category_id', 1)->whereBetween('created_at', [$first_day, $last_day])->get();
        $expenses = $user->transactions()->where('category_id', '>', 1)->whereBetween('created_at', [$first_day, $last_day])->get();

        foreach($incomes as $income){
            $transactions['incomes'][] = [
                'id' => $income->id,
                'amount' => $income->amount,
                'description' => $income->description,
                'category_id' => $income->category_id,
                'created_at' => $income->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $income->updated_at->format('Y-m-d H:i:s'),
            ];
        }

        foreach($expenses as $expense){
            $transactions['expenses'][] = [
                'id' => $expense->id,
                'amount' => $expense->amount,
                'description' => $expense->description,
                'category_id' => $expense->category_id,
                'created_at' => $expense->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $expense->updated_at->format('Y-m-d H:i:s'),
            ];
        }

        return response()->json($transactions);
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
    public function destroy(Request $request, string $id)
    {
        //Remove a transação
        $user = $request->user();

        $transaction = $user->transactions()->find($id);

        if(!$transaction){
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        if($transaction->category_id == 1){
            $user->total_amount = $user->total_amount - $transaction->amount;
        }else{
            $user->total_amount = $user->total_amount + $transaction->amount;
        }

        $user->save();

        $transaction->delete();

        return response()->json(['success' => true]);
    }
}
