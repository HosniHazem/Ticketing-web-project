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
            $table->integer('Category_id')->unsigned();
            $table->foreign('Category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('user_id');
            $table->string('category_name');
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
