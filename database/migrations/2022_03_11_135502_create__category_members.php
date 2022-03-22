<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Category_id')->unsigned()->nullable();
            $table->foreign('Category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('category_name')->nullable();
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
        Schema::dropIfExists('_category_members');
    }
}
