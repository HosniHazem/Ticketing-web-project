<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Levels;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Impacts;
use App\Models\Urgency;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Priority;
use App\Models\Locations;
use App\Models\Departments;
use App\Models\SubCategory;
use App\Models\Request_type;
use App\Models\TicketModels;
use Illuminate\Http\Request;
use App\Models\TicketCloseModel;
use App\Models\TicketAttachements;

class TicketController extends Controller
{
    public function show($id)
    {
        if($item){

        return response()->json(['level'=>$item3->name,'impact'=>$item4->name,'Urgency'=>$item5->name,'priority'=>$item6->name,'request_type'=>$item7->name,'ticket_models'=>$item10->name,'category'=>$item11->name,'departments'=>$item13->Name,'status'=>$item15->name,'subject'=>$item->Subject,'Description'=>$item->Description,'estimated_time'=>$item->EstimatedTime,'due_time'=>$item->DueDate,'solution_description'=>$item->SolutionDescription,'attachment'=>$item2->file_size], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Ticket::all();

        return response()->json(['Ticket'=>$item], 200);
    }

    public function store(Request $req)
    {

        $item =new Ticket();
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->RequestTypeID=$req->RequestTypeID;
        $item->EstimatedTime=$req->EstimatedTime;
        $item->StatusID=$req->StatusID;
        $item->UrgentID=$req->UrgentID;
        $item->CategoryID=$req->CategoryID;
        $item->CreatedUser=$req->CreatedUser;
        $item->UpdatedUser=$req->UpdatedUser;
        $item->RequestedUser=$req->RequestedUser;
        $item->AssignedUser=$req->AssignedUser;
        $item->AssignedDate=$req->AssignedDate;
        $item->TicketAttachment=$req->TicketAttachment;
        $item->AssignedUser=$req->AssignedUser;
        $item->LevelID=$req->LevelID;
        $item->DueDate=$req->DueDate;
        $item->SolutionDescription=$req->SolutionDescription;


        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {

        $item =Ticket::find($id);
        if($item){

            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->RequestTypeID=$req->RequestTypeID;
            $item->EstimatedTime=$req->EstimatedTime;
            $item->StatusID=$req->StatusID;
            $item->UrgentID=$req->UrgentID;
            $item->CategoryID=$req->CategoryID;
            $item->CreatedUser=$req->CreatedUser;
            $item->UpdatedUser=$req->UpdatedUser;
            $item->RequestedUser=$req->RequestedUser;
            $item->AssignedUser=$req->AssignedUser;
            $item->AssignedDate=$req->AssignedDate;
            $item->TicketAttachment=$req->TicketAttachment;
            $item->AssignedUser=$req->AssignedUser;
            $item->LevelID=$req->LevelID;
            $item->DueDate=$req->DueDate;
            $item->SolutionDescription=$req->SolutionDescription;

            $item->update();
        return response()->json(['message'=>'done'], 200);
                }
                else
                {
                return response()->json(['message'=>'not done'], 404);
                }
    }
    public function destroy($id)
    {

        $item =Ticket::find($id);

        if($item){
        $item->delete();
        return response()->json(['message'=>'deleted'], 200);
                }
                else
                {
                return response()->json(['message'=>'not deleted'], 404);
                }
    }
}
