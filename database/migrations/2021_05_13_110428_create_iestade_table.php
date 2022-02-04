<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIestadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iestade', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Nosaukums', 60);
            $table->string('Registracijas_numurs', 12);
            $table->string('Talrunis', 8);
            $table->string('Epasts', 60);
            $table->string('Adrese', 60);
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
        Schema::dropIfExists('iestade');
    }
}
