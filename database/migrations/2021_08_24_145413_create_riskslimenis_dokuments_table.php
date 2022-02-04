<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskslimenisDokumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riskslimenis_dokuments', function (Blueprint $table) {
            $table->id("ID");
            $table->string("RisksLimenis_ID");
            $table->string("Dokuments_ID");
            $table->string("RiskaPasakums_ID");
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
        Schema::dropIfExists('riskslimenis_dokuments_');
    }
}
