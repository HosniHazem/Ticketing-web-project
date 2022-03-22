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
            $table->increments('CommentId');
            $table->integer("AuthorId")->nullable();
            $table->integer("ParentCommentId")->nullable();
            $table->integer('TicketId')->unsigned()->nullable();
            $table->foreign('TicketId')->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string("Boby")->nullable();
            $table->datetime("CreatedDate")->nullable();
            $table->datetime("update_date")->nullable();


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
