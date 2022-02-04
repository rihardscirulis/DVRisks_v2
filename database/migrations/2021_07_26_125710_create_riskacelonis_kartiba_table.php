<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskacelonisKartibaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riskacelonis_kartiba', function (Blueprint $table) {
            $table->id('ID');
            $table->string('RiskaCelonisID');
            $table->string('RiskaKartibaID');
            $table->string('FaktoraGrupaID');
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
        Schema::dropIfExists('riskacelonis_kartiba');
    }
}
