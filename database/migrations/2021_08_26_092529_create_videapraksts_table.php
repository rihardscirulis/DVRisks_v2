<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideaprakstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vide_apraksts', function (Blueprint $table) {
            $table->id("ID");
            $table->string("Novertesanas_apstaklis", 250);
            $table->string("Darba_procesa_apraksts", 250);
            $table->string("Dokuments_ID");
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
        Schema::dropIfExists('vide_apraksts');
    }
}
