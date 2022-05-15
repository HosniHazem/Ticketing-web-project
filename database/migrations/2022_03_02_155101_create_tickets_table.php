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
            $table->integer('DisplayTicketID');
            $table->String('Subject');
            $table->String('Description');
            $table->integer('RequestTypeID')->unsigned();
            $table->foreign('RequestTypeID')->references('id')->on('request_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('StatusID')->unsigned();
            $table->foreign('StatusID')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('PriorityID')->unsigned();
            $table->foreign('PriorityID')->references('id')->on('priority')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('UrgentID')->unsigned();
            $table->foreign('UrgentID')->references('id')->on('urgency')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('CategoryID')->unsigned();
            $table->foreign('CategoryID')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ImpactID')->unsigned();
            $table->foreign('ImpactID')->references('id')->on('impacts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('DepartmentID')->unsigned();
            $table->foreign('DepartmentID')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('LevelID')->unsigned();
            $table->foreign('LevelID')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('LocationID')->unsigned();
            $table->foreign('LocationID')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('TicketModeID')->unsigned();
            $table->foreign('TicketModeID')->references('id')->on('ticket_models')->onDelete('cascade')->onUpdate('cascade');
            $table->String("CreatedUser");
            $table->String("UpdatedUser");
            $table->String("RequestedUser");
            $table->integer("UseId")->unsigned();
            $table->foreign('UseId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime("AssignedDate");
            $table->datetime("DueDate");
            $table->String("SolutionDescription");
            $table->integer("IPAddress");
            $table->datetime("ClosedDate");
            $table->integer('TicketCloseModelID')->unsigned();
            $table->foreign('TicketCloseModelID')->references('id')->on('ticket_close_models')->onDelete('cascade')->onUpdate('cascade');
            $table->String("StatusCloseReason");
            $table->string("Is_FCR");
            $table->string("Is_Active");
            $table->String("TicketStatusMessage");
            $table->datetime("EstimatedTime");
            $table->datetime("SpentTime");
            $table->string("Is_Validate_EstimatedTime");
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
