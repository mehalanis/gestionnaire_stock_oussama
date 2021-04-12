<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargeTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_totals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fiche_comptable_id');
            $table->foreign('fiche_comptable_id')->references('id')->on('FicheComptable')->onDelete('cascade');
            $table->double("Solde")->default(0);
            $table->integer("type");
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
        Schema::dropIfExists('charge_totals');
    }
}
