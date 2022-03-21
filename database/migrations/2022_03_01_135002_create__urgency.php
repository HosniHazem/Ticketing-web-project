<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrgency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urgency', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable;
            $table->string("description")->nullable;
            $table->boolean("Is_Active")->nullable;
            $table->boolean("Is_Defaults")->nullable;
            $table->boolean("Is_client_visible")->nullable;
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
        Schema::dropIfExists('_urgency');
    }
}
