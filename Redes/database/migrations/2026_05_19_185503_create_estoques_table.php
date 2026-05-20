<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {

            $table->id();

            $table->string('nome');

            $table->enum('tipo', [
                'Servidor',
                'Roteador',
                'Switch'
            ]);

            $table->enum('voltagem', [
                '110V',
                '220V',
                'Bivolt'
            ]);

            $table->integer('quantidade')->default(0);

            $table->integer('estoque_minimo')->default(2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};