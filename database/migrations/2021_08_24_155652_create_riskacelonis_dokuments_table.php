<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskacelonisDokumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riskacelonis_dokuments', function (Blueprint $table) {
            $table->id("ID");
            $table->string("RiskaCelonisID");
            $table->string("Dokuments_ID");
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
        Schema::dropIfExists('riskacelonis_dokuments');
    }
}
