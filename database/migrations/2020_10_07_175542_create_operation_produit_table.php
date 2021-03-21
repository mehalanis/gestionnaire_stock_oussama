<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_produit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('Produits')->onDelete('cascade');;
            $table->unsignedBigInteger('Operation_id');
            $table->foreign('Operation_id')->references('id')->on('Operations')->onDelete('cascade');;
            $table->integer('Qte');
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
        Schema::dropIfExists('operation_produit');
    }
}
