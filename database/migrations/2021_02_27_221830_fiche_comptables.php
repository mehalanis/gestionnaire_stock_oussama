<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FicheComptables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FicheComptable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entreprise_id');
            $table->foreign('entreprise_id')->references('id')->on('Entreprises')->onDelete('cascade');
            $table->string('NomSociete', 45)->nullable();
            $table->string('Email', 50)->nullable();
            $table->date("du")->nullable();
            $table->date("a")->nullable();
           /* $table->double("SoldePaysera")->nullable();
            $table->double("transport")->nullable();
            $table->double("employes")->nullable();
            $table->integer("QteAppel");
            $table->double("PrixAppel");
            $table->integer("QteStockage");
            $table->double("PrixStockage");
            $table->double("Revenu");*/
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
        Schema::dropIfExists('FicheComptable');
    }
}
