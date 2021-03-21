<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChargeProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChargeProduits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fiche_comptable_id');
            $table->string('Designation', 100)->nullable();
            $table->integer("Qte");
            $table->double("PrixUnit");
            $table->foreign('fiche_comptable_id')->references('id')->on('FicheComptable')->onDelete('cascade');
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
        Schema::dropIfExists('ChargeProduits');
    }
}
