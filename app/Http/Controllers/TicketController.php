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
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function priority()
    {
        $priority = Priority::all();
        return response()->json([
            'status' => 200,
            'priority' => $priority,
        ]);
    }
    public function levels()
    {
        $levels = Levels::all();
        return response()->json([
            'status' => 200,
            'levels' => $levels,
        ]);
    }

    public function status()
    {
        $status = Status::all();

        return response()->json([
            'status' => 200,
            'status' => $status,
        ]);
    }

    public function users()
    {

        $users = User::all();

        return response()->json([
            'status' => 200,
            'users' => $users,

        ]);
    }

    public function show($id)
    {
        $item =Ticket::find($id);
        if($item){

        return response()->json(['Ticket'=>$item,'status' => 200], 200);
        }
    else
    {
    return response()->json(['message'=>'not found','status' => 404], 404);
    }
    }


    public function uploadimage(Request $request)
    {



            $file      = $request->file('attach');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = $filename;
            //move image to public/img folder
            $file->move(public_path('images/uploads'), $picture);
            return response()->json(["message" => "Image Uploaded Succesfully",'status' => 200]);




    }



    public function index()
    {



        $item = Ticket::with('priority')->with('levels')->with('status')->with('users');


        if ($item) {
            return response()->json([
                'status' => 200,
                'Ticket' => $item->get(),

            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Aucune ticket trouvé',
            ]);
        }
    }

    public function store(Request $req)
    {

        $item =new Ticket();
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->RequestTypeID=$req->RequestTypeID;
        $item->EstimatedTime=$req->EstimatedTime;
        $item->EstimatedDate=$req->EstimatedDate;
        $item->StatusID=$req->StatusID;
        $item->PriorityID=$req->PriorityID;
        $item->UrgentID=$req->UrgentID;
        $item->CategoryID=$req->CategoryID;
        $item->SubCategoryID=$req->SubCategoryID;
        $item->CreatedUser=$req->CreatedUser;
        $item->UpdatedUser=$req->UpdatedUser;
        $item->RequestedUser=$req->RequestedUser;
        $item->AssignedUser=$req->AssignedUser;
        $item->AssignedDate=$req->AssignedDate;
        $item->attach=$req->attach;
        $item->AssignedUser=$req->AssignedUser;
        $item->LevelID=$req->LevelID;
        $item->DueDate=$req->DueDate;
        $item->SolutionDescription=$req->SolutionDescription;


        $item->save();
        return response()->json(['message'=>'done','status' => 200], 200);
    }
    public function update(Request $req,$id)
    {

        $item =Ticket::find($id);
        if($item){

            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->RequestTypeID=$req->RequestTypeID;
            $item->EstimatedTime=$req->EstimatedTime;
            $item->EstimatedDate=$req->EstimatedDate;
            $item->StatusID=$req->StatusID;
            $item->UrgentID=$req->UrgentID;
            $item->CategoryID=$req->CategoryID;
            $item->SubCategoryID=$req->SubCategoryID;
            $item->CreatedUser=$req->CreatedUser;
            $item->UpdatedUser=$req->UpdatedUser;
            $item->RequestedUser=$req->RequestedUser;
            $item->AssignedUser=$req->AssignedUser;
            $item->AssignedDate=$req->AssignedDate;
            $item->attach=$req->attach;
            $item->AssignedUser=$req->AssignedUser;
            $item->PriorityID=$req->PriorityID;
            $item->LevelID=$req->LevelID;
            $item->DueDate=$req->DueDate;
            $item->SolutionDescription=$req->SolutionDescription;

            $item->update();
        return response()->json(['message'=>'done','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404], 404);
                }
    }
    public function destroy($id)
    {

        $item =Ticket::find($id);

        if($item){
        $item->delete();
        return response()->json(['message'=>'deleted','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not deleted','status' => 404], 404);
                }
    }
}
