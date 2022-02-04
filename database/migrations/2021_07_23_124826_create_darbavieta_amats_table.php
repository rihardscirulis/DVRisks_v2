<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarbavietaAmatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darbavieta_persona', function (Blueprint $table) {
            $table->id('ID');
            $table->string('DarbaVietaID');
            $table->string('PersonaID');
            $table->string('VideID');
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
        Schema::dropIfExists('darbavieta_amats');
    }
}
