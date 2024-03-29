<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Subject');
            $table->String('Description');
            $table->integer('RequestTypeID')->unsigned()->nullable();
            $table->foreign('RequestTypeID')->references('id')->on('request_types')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('StatusID')->unsigned()->nullable();
            $table->foreign('StatusID')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('PriorityID')->unsigned()->nullable();
            $table->foreign('PriorityID')->references('id')->on('priority')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('UrgentID')->unsigned()->nullable();
            $table->foreign('UrgentID')->references('id')->on('urgency')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('CategoryID')->unsigned()->nullable();
            $table->foreign('CategoryID')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('SubCategoryID')->unsigned()->nullable();
            $table->foreign('SubCategoryID')->references('id')->on('sub_category')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('ImpactID')->unsigned()->nullable();
            $table->foreign('ImpactID')->references('id')->on('impacts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('DepartmentID')->unsigned()->nullable();
            $table->foreign('DepartmentID')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('LevelID')->unsigned()->nullable();
            $table->foreign('LevelID')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('LocationID')->unsigned()->nullable();
            $table->foreign('LocationID')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('TicketModeID')->unsigned()->nullable();
            $table->foreign('TicketModeID')->references('id')->on('ticket_models')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->String("CreatedUser")->nullable();
            $table->String('RequestedUser');
            $table->String("Username")->nullable();
            $table->integer('AssignedUser')->unsigned()->nullable();
            $table->foreign('AssignedUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->datetime("AssignedDate")->nullable();
            $table->datetime("DueDate");
            $table->String("SolutionDescription")->nullable();
            $table->String("attach")->nullable();
            $table->integer("TicketClose")->nullable();
            $table->datetime("ClosedDate")->nullable();
            $table->integer('TicketCloseModelID')->unsigned()->nullable();
            $table->foreign('TicketCloseModelID')->references('id')->on('ticket_close_models')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->String("StatusCloseReason")->nullable();
            $table->integer("rate")->nullable();
            $table->String("Is_Active")->nullable();
            $table->String("TicketStatusMessage")->nullable();
            $table->String("EstimatedTime")->nullable();
            $table->String("Organization")->nullable();
            $table->String("EstimatedDate")->nullable();
            $table->String("SpentTime")->nullable();
            $table->boolean("Is_Validate_EstimatedTime")->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
