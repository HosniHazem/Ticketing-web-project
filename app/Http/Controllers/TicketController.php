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
use Illuminate\Support\Facades\Validator;
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

    public function category()
    {

        $category = Category::all();

        return response()->json([
            'status' => 200,
            'category' => $category,

        ]);
    }
    public function sub_category()
    {

        $sub_category = SubCategory::all();

        return response()->json([
            'status' => 200,
            'sub_category' => $sub_category,

        ]);
    }
    public function request_types()
    {

        $request_types = Request_type::all();

        return response()->json([
            'status' => 200,
            'request_types' => $request_types,

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



        $item = Ticket::with('priority')->with('levels')->with('status')->with('users')->with('category')->with('request_types')->with('sub_category');


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
        $validator = Validator::make($req->all(), [
            'Subject' => 'required',
            'Description' => 'required',
            'RequestTypeID' => 'required',
            'PriorityID' => 'required',
            'CategoryID' => 'required',
            'SubCategoryID' => 'required',
            'RequestedUser' => 'required',
            'DueDate' => 'required',
            'Organization' => 'required',
            'Username' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Ticket();
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->RequestTypeID=$req->RequestTypeID;
        $item->PriorityID=$req->PriorityID;
        $item->CategoryID=$req->CategoryID;
        $item->SubCategoryID=$req->SubCategoryID;
        $item->RequestedUser=$req->RequestedUser;
        $item->attach=$req->attach;
        $item->DueDate=$req->DueDate;
        $item->Organization=$req->Organization;
        $item->Username=$req->Username;


        $item->save();
        return response()->json(['message'=>'done','status' => 200], 200);
    }}
    public function updateclient(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'Subject' => 'required',
            'Description' => 'required',
            'RequestTypeID' => 'required',
            'PriorityID' => 'required',
            'CategoryID' => 'required',
            'SubCategoryID' => 'required',
            'RequestedUser' => 'required',
            'DueDate' => 'required',
            'Organization' => 'required',
            'Username' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Ticket::find($id);
        if($item){
            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->RequestTypeID=$req->RequestTypeID;
            $item->PriorityID=$req->PriorityID;
            $item->CategoryID=$req->CategoryID;
            $item->SubCategoryID=$req->SubCategoryID;
            $item->RequestedUser=$req->RequestedUser;
            $item->attach=$req->attach;
            $item->DueDate=$req->DueDate;
            $item->Organization=$req->Organization;
            $item->Username=$req->Username;
            $item->update();
        return response()->json(['message'=>'done','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404], 404);
                }
    }}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [

            'EstimatedTime'=>'required',
            'EstimatedDate'=>'required',
            'StatusID'=>'required',
            'AssignedUser'=>'required',
            'LevelID'=>'required',
            'SolutionDescription'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Ticket::find($id);
        if($item){

            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->RequestTypeID=$req->RequestTypeID;
            $item->EstimatedTime=$req->EstimatedTime;
            $item->EstimatedDate=$req->EstimatedDate;
            $item->StatusID=$req->StatusID;
            $item->CategoryID=$req->CategoryID;
            $item->SubCategoryID=$req->SubCategoryID;
            $item->RequestedUser=$req->RequestedUser;
            $item->AssignedUser=$req->AssignedUser;
            $item->AssignedDate=$req->AssignedDate;
            $item->attach=$req->attach;
            $item->AssignedUser=$req->AssignedUser;
            $item->PriorityID=$req->PriorityID;
            $item->LevelID=$req->LevelID;
            $item->DueDate=$req->DueDate;
            $item->SolutionDescription=$req->SolutionDescription;
            $item->TicketClose=$req->TicketClose;
            $item->Organization=$req->Organization;
            $item->SpentTime=$req->SpentTime;
            $item->StatusCloseReason=$req->StatusCloseReason;
            $item->ClosedDate=$req->ClosedDate;
            $item->rate=$req->rate;
            $item->Username=$req->Username;
            $item->update();
        return response()->json(['message'=>'done','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404], 404);
                }
    }}
    public function updatepick(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [

            'AssignedUser'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Ticket::find($id);
        if($item){

            $item->Subject=$req->Subject;
            $item->Description=$req->Description;
            $item->RequestTypeID=$req->RequestTypeID;
            $item->EstimatedTime=$req->EstimatedTime;
            $item->EstimatedDate=$req->EstimatedDate;
            $item->StatusID=$req->StatusID;
            $item->CategoryID=$req->CategoryID;
            $item->SubCategoryID=$req->SubCategoryID;
            $item->RequestedUser=$req->RequestedUser;
            $item->AssignedUser=$req->AssignedUser;
            $item->AssignedDate=$req->AssignedDate;
            $item->attach=$req->attach;
            $item->AssignedUser=$req->AssignedUser;
            $item->PriorityID=$req->PriorityID;
            $item->LevelID=$req->LevelID;
            $item->DueDate=$req->DueDate;
            $item->SolutionDescription=$req->SolutionDescription;
            $item->TicketClose=$req->TicketClose;
            $item->Organization=$req->Organization;
            $item->SpentTime=$req->SpentTime;
            $item->StatusCloseReason=$req->StatusCloseReason;
            $item->ClosedDate=$req->ClosedDate;
            $item->rate=$req->rate;
            $item->Username=$req->Username;
            $item->update();
        return response()->json(['message'=>'done','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404], 404);
                }
    }}
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
