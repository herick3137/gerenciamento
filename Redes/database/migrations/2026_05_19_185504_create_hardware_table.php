<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hardware', function (Blueprint $table) {

            $table->id();

            $table->foreignId('estoque_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nome');

            $table->string('ip')->unique();

            $table->string('mac')->unique();

            $table->enum('status', [
                'Operacional',
                'Manutenção',
                'Inativo'
            ])->default('Operacional');

            $table->date('ultima_manutencao')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};