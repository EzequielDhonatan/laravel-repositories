<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO PRODUTO
            ================================================== */
            $table->bigInteger('category_id')->unsigned()->nullable(); ## CATEGORIA

            $table->string('name')->unique(); ## NOME
            $table->string('url')->unique(); ## URL
            $table->double('price', 10, 2)->unique(); ## PREÇO
            $table->text('description')->nullale(); ## DESCRIÇÃO

            ## CATEGORIA
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
