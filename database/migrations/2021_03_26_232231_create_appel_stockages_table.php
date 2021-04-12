<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelStockagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appel_stockages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fiche_comptable_id');
            $table->foreign('fiche_comptable_id')->references('id')->on('FicheComptable')->onDelete('cascade');
            $table->integer("qte");
            $table->double("prix");
            $table->integer("type"); // 1:appel 2: stockages
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
        Schema::dropIfExists('appel_stockages');
    }
}
