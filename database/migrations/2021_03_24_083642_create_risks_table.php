<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Risks', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Nosaukums', 250);
            $table->string('Celonis', 250);
            $table->string('Novertejums', 250);
            $table->integer('Faktors_ID');
            $table->integer('RisksLimenis_ID')->nullable()->change();
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
        Schema::dropIfExists('Risks');
    }
}
