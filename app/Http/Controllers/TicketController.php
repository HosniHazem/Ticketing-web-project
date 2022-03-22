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

        $item =Ticket::find($id);
        $item2 =TicketAttachements::find($id);
        $item3 =Levels::find($id);
        $item4 =Impacts::find($id);
        $item5 =Urgency::find($id);
        $item6 =Priority::find($id);
        $item7 =Request_type::find($id);
        $item10 =TicketModels::find($id);
        $item11 =Category::find($id);
        $item13 =Departments::find($id);
        $item15 =Status::find($id);
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

        $item3 =new Levels();

        $item3->name=$req->namelevel;


        $item4 =new Impacts();

        $item4->name=$req->nameimpact;

        $item5 =new Urgency();

        $item5->name=$req->nameurgency;


        $item6 =new Priority();

        $item6->name=$req->namepriority;

        $item7 =new Request_type();

        $item7->name=$req->namerequesttyp;
        $item7->save();

        /*$item8 =new User();
        $item8->id=$req->CreatedUser;
        $item8->id=$req->UpdatedUser;
        $item8->id=$req->RequestedUser;
        $item8->id=$req->AssignedUser;*/



        $item10 =new TicketModels();

        $item10->name=$req->nametticketmodel;


        $item11 =new Category();

        $item11->name=$req->namecategory;





        $item13 =new Departments();

        $item13->Name=$req->namedepartement;



        $item15 =new Status();

        $item15->name=$req->namestatu;


        $item3->save();
        $item4->save();
        $item5->save();
        $item6->save();
        $item7->save();
        $item10->save();
        $item11->save();
        $item12 =new SubCategory();
        $item12->category_id=$item11->id;
        $item12->save();

        $item14 =new Items();
        $item14->sub_category_id=$item12->id;
        $item14->save();
        $item13->save();
        $item15->save();
        $item16 =new TicketCloseModel();
        $item17 =new Locations();
        $item16->save();
        $item17->save();
        $item =new Ticket();
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->EstimatedTime=$req->EstimatedTime;
        $item->DueDate=$req->DueDate;
        $item->SolutionDescription=$req->SolutionDescription;
        $item->LevelID=$item3->id;
        $item->ImpactID=$item4->id;
        $item->UrgentID=$item5->id;
        $item->PriorityID=$item6->id;
        $item->TicketModeID=$item10->id;
        $item->CategoryID=$item11->id;
        $item->DepartmentID=$item13->id;
        $item->RequestTypeID=$item7->id;
        $item->StatusID=$item15->id;
        $item->LocationID=$item->id;
        $item->TicketCloseModelID=$item->id;
        $item->save();

        $item2 =new TicketAttachements();
        $item2->file_size=$req->file_size;
        $item2->TicketId=$item->id;
        $item2->save();

        $item9 =new Comments();
        $item9->TicketId=$item->id;
        $item9->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {

        $item =Ticket::find($id);
        $item2 =TicketAttachements::find($id);
        $item3 =Levels::find($id);
        $item4 =Impacts::find($id);
        $item5 =Urgency::find($id);
        $item6 =Priority::find($id);
        $item7 =Request_type::find($id);
        $item10 =TicketModels::find($id);
        $item11 =Category::find($id);
        $item13 =Departments::find($id);
        $item15 =Status::find($id);

        if($item){

            $item3->name=$req->namelevel;

            $item4->name=$req->nameimpact;

            $item5->name=$req->nameurgency;


            $item6->name=$req->namepriority;

            $item7->name=$req->namerequesttyp;
            $item7->update();


            $item10->name=$req->nametticketmodel;
            $item11->name=$req->namecategory;
            $item13->Name=$req->namedepartement;
            $item15->name=$req->namestatu;
            $item3->update();
            $item4->update();
            $item5->update();
            $item6->update();
            $item7->update();
            $item10->update();
            $item11->update();
            $item13->update();
            $item15->update();
            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->EstimatedTime=$req->EstimatedTime;
            $item->DueDate=$req->DueDate;
            $item->SolutionDescription=$req->SolutionDescription;
            $item->update();
            $item2->file_size=$req->file_size;
            $item2->update();
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
        $item2 =TicketAttachements::find($id);
        $item3 =Levels::find($id);
        $item4 =Impacts::find($id);
        $item5 =Urgency::find($id);
        $item6 =Priority::find($id);
        $item7 =Request_type::find($id);
        //$item9 =Comments::find($id);
        $item10 =TicketModels::find($id);
        $item11 =Category::find($id);
        $item12 =SubCategory::find($id);
        $item13 =Departments::find($id);
        $item14 =Items::find($id);
        $item15 =Status::find($id);
        $item16 =TicketCloseModel::find($id);
        $item17 =Locations::find($id);
        if($item){
        $item->delete();
        $item2->delete();
        $item3->delete();
        $item4->delete();
        $item5->delete();
        $item6->delete();
        $item7->delete();
        //$item9->delete();
        $item10->delete();
        $item11->delete();
        $item12->delete();
        $item14->delete();
        $item13->delete();
        $item15->delete();
        $item16->delete();
        $item17->delete();
        return response()->json(['message'=>'deleted'], 200);
                }
                else
                {
                return response()->json(['message'=>'not deleted'], 404);
                }
    }
}
