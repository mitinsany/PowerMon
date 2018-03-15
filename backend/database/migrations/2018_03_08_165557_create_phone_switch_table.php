<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneSwitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_switch', function (Blueprint $table) {
            $table->unsignedInteger('switch_id')->index();
            $table->foreign('switch_id')->references('id')->on('switches')->onDelete('cascade');

            $table->unsignedInteger('phone_id')->index();
            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');

            //$table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_switch');
    }
}
