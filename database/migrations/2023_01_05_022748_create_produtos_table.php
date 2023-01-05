<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->boolean('ativo')->default(null);
            $table->timestamps();
        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->boolean('ativo')->default(false);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('unidade_medida_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('unidade_medida_id')->references('id')->on('unidade_medidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidade_medidas');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('produtos');
    }
}
