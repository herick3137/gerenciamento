<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manutencaos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('hardware_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('tipo', [
                'preventiva',
                'corretiva'
            ]);

            $table->date('manutencao');

            $table->text('descricao')->nullable();

            $table->string('responsavel')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manutencaos');
    }
};