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
            $table->integer('UserID')->unsigned();
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('RequestTypeID')->unsigned();
            $table->foreign('RequestTypeID')->references('id')->on('request_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('CategoryID')->unsigned();
            $table->foreign('CategoryID')->references('id')->on('sub_category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('SubCategoryID')->unsigned();
            $table->foreign('SubCategoryID')->references('id')->on('sub_category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('PriorityID')->unsigned();
            $table->foreign('PriorityID')->references('id')->on('priority')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime("DueDate");
            $table->integer('TicketAttachmentsID')->unsigned();
            $table->foreign('TicketAttachmentsID')->references('id')->on('ticket_attachments')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('LevelID')->unsigned();
            $table->foreign('LevelID')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime("EstimatedTime");
            $table->datetime("ProvisionalClosedDate");
            $table->integer('StatusID')->unsigned();
            $table->foreign('StatusID')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('StatusDetailID')->unsigned();
            $table->foreign('StatusDetailID')->references('id')->on('CreateStatusDetail')->onDelete('cascade')->onUpdate('cascade');//AJOUTER
            $table->String("StatusCloseReason");
            $table->datetime("RealizedTime");
            $table->datetime("ClosedDate");
            $table->integer("evaluation");

            $table->integer('DisplayTicketID');//            
            $table->integer('UrgentID')->unsigned();
            $table->foreign('UrgentID')->references('id')->on('urgency')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ImpactID')->unsigned();
            $table->foreign('ImpactID')->references('id')->on('impacts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('DepartmentID')->unsigned();
            $table->foreign('DepartmentID')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('LocationID')->unsigned();
            $table->foreign('LocationID')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('TicketModeID')->unsigned();
            $table->foreign('TicketModeID')->references('id')->on('ticket_models')->onDelete('cascade')->onUpdate('cascade');
            $table->String("CreatedUser");
            $table->String("UpdatedUser");
            $table->String("RequestedUser");
            $table->datetime("AssignedDate");
            $table->String("SolutionDescription");
            $table->integer("IPAddress");
            $table->integer('TicketCloseModelID')->unsigned();
            $table->foreign('TicketCloseModelID')->references('id')->on('ticket_close_models')->onDelete('cascade')->onUpdate('cascade');
            $table->string("Is_FCR");
            $table->string("Is_Active");
            $table->String("TicketStatusMessage");
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
