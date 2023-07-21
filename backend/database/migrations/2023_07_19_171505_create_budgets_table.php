<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * A tabela "budgets" é usada para gerenciar os orçamentos
     * mensais para diferentes categorias de despesas.
     * Cada registro na tabela representa um orçamento específico para uma determinada
     * This function returns the expenses category for a given user.

     * categoria de gastos para um determinado usuário.
     * Essa tabela é útil para permitir que os usuários definam metas de gastos mensais
     * para diferentes áreas de suas finanças e acompanhem o cumprimento dessas metas ao longo do tempo.
     */

    public function up(): void
        {
            Schema::create('budgets', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('category_id')->constrained();
                $table->integer('budget_amount');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
