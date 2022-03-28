<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("UserId")->unsigned()->nullable();
            $table->foreign('UserId')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer("ParentCommentId");
            $table->integer('TicketId')->unsigned()->nullable();
            $table->foreign('TicketId')->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string("Boby");
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
        Schema::dropIfExists('comments');
    }
}
