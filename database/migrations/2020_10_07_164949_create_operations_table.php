<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Operation;
class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nom');
            $table->timestamps();
        });
        $s1=new Operation(); $s1->nom="Stock";$s1->save();
        $s1=new Operation(); $s1->nom="Sortie";$s1->save();
        $s1=new Operation(); $s1->nom="Vendu";$s1->save();
        $s1=new Operation(); $s1->nom="Retoure";$s1->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Operations');
    }
}
