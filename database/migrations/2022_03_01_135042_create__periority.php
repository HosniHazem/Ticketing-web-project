<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("description");
            $table->string("color");
            $table->boolean("Is_Active");
            $table->boolean("Is_Defaults");
            $table->boolean("Is_client_visible");
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
        Schema::dropIfExists('_periority');
    }
}
