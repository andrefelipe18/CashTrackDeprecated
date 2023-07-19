<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('description');
            $table->integer('target_amount');
            $table->integer('current_amount');
            $table->integer('achieved_amount'); //achieved_amount: O valor atual alcançado em direção à meta (esse valor será atualizado à medida que o usuário faz progresso).
            $table->boolean('is_completed');
            $table->string('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
