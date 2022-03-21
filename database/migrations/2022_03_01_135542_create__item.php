<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_category')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable;
            $table->string('description')->nullable;
            $table->boolean('is_active')->nullable;
            $table->boolean('is_default')->nullable;
            $table->boolean('is_client_visible')->nullable;
            $table->integer('external_code')->nullable;
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
        Schema::dropIfExists('_item');
    }
}
