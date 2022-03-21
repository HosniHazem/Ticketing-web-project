<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable;
            $table->string("description")->nullable;
            $table->boolean("Is_Active")->nullable;
            $table->boolean("Is_Defaults")->nullable;
            $table->boolean("Is_client_visible")->nullable;
            $table->datetime("created_date")->nullable;
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
        Schema::dropIfExists('_impact');
    }
}
