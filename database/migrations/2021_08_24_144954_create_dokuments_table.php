<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokuments', function (Blueprint $table) {
            $table->id("ID");
            $table->string("Dokumenta_numurs");
            $table->string("Nosaukums");
            $table->string("Datums");
            $table->string("Iestade_ID");
            $table->string("Persona_ID");
            $table->string("Vide_ID");
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
        Schema::dropIfExists('dokuments');
    }
}
