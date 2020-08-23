<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_orcamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30)->nullable();
            $table->foreignId('conta_id')->nullable();
            $table->date('data_vencimento')->nullable();
            $table->decimal('valor', 8, 2)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('descricao')->nullable();
            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('item_orcamentos');
    }
}
