<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesRevenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses__revenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entreprise_id');
            $table->integer("type"); // 1-> Depenses 2-> Revenus
            $table->text("Poste");
            $table->double('Montant');
            $table->foreign('entreprise_id')->references('id')->on('Entreprises')->onDelete('cascade');
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
        Schema::dropIfExists('depenses__revenus');
    }
}
