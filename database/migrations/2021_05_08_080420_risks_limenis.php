<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RisksLimenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RisksLimenis', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Nosaukums', 250);
            $table->timestamps();
        });

        DB::table('RisksLimenis')
            ->insert(
                array(
                    array('Nosaukums' => 'I - nenozīmīgs risks', 'created_at' => now(), 'updated_at' => now()),
                    array('Nosaukums' => 'II - pieņemams risks', 'created_at' => now(), 'updated_at' => now()),
                    array('Nosaukums' => 'III - ciešams risks', 'created_at' => now(), 'updated_at' => now()),
                    array('Nosaukums' => 'IV - nozīmīgs risks', 'created_at' => now(), 'updated_at' => now()),
                    array('Nosaukums' => 'V - neciešams risks', 'created_at' => now(), 'updated_at' => now()),
                )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RisksLimenis');
    }
}
