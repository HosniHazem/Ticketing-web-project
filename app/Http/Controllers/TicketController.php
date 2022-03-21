<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function show($id)
    {

        $item =Ticket::find($id);
        if($item){

        return response()->json(['Item'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Ticket::all();

        return response()->json(['Item'=>$item], 200);
    }

    public function store(Request $req)
    {

        $item =new Ticket();
        $item->D=$req->DisplayTicketID;
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->EstimatedTime=$req->EstimatedTime;
        $item->DueDate=$req->DueDate;
        $item->SolutionDescription=$req->SolutionDescription;
        
        $item2 =new TicketAttachements();
        $item2->file_size=$req->file_size;
        $item2->TicketId=$item->id;

        $item3 =new Levels();
        $item->LevelID=$item3->id;
        $item3->name=$req->namelevel;


        $item4 =new Impacts();
        $item->ImpactID=$item4->id;
        $item4->name=$req->nameimpact;

        $item5 =new Urgency();
        $item->UrgentID=$item5->id;
        $item5->name=$req->nameurgency;


        $item6 =new Priority();
        $item->PriorityID=$item6->id;
        $item6->name=$req->namepriority;
        
        $item7 =new Request_type();
        $item->RequestTypeID=$item7->id;
        $item7->name=$req->namerequesttype;

        /*$item8 =new User();
        $item8->id=$req->CreatedUser;
        $item8->id=$req->UpdatedUser;
        $item8->id=$req->RequestedUser;
        $item8->id=$req->AssignedUser;*/

        $item9 =new Comments();
        $item9->id=$item->CommentId;
        
        $item10 =new TicketModels();
        $item->TicketModeID=$item10->id;
        $item10->name=$req->nametticketmodel;
        
        
        $item11 =new Category();
        $item->CategoryID=$item11->id;
        $item11->name=$req->namecategory;
        
        $item12 =new SubCategory();
        $item->SubCategoryID=$item12->id;
        $item12->CategoryID=$item11->id;
        
        $item13 =new Departments();
        $item->DepartmentID=$item13->id;
        $item13->name=$req->namedepartement;
        
        $item14 =new Items();
        $item->ItemID=$item14->id;
        $item14->SubCategoryID=$item12->id;
        
        $item15 =new Status();
        $item->StatusID=$item15->id;
        $item15->name=$req->namestatu;

        
        $item16 =new Locations();
        $item->LocationID=$item16->id;
        
        $item17 =new TicketCloseModel();
        $item->TicketCloseModelID=$item17->id;

        $item->save();
        $item2->save();
        $item3->save();
        $item4->save();
        $item5->save();
        $item6->save();
        $item7->save();
        $item8->save();
        $item9->save();
        $item10->save();
        $item11->save();
        $item12->save();
        $item13->save();
        $item14->save();
        $item15->save();
        $item16->save();
        $item17->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {

        $item =Ticket::find($id);
        if($item){
        $item->DisplayTicketID=$req->DisplayTicketID;
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
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
