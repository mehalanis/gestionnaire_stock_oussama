<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepensesRevenusEntreprises extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('Entreprises', function (Blueprint $table) {
      $table->double('Depenses')->default(0);
      $table->double('Revenus')->default(0);
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('Entreprises', function (Blueprint $table) {
      //
    });
  }
}
