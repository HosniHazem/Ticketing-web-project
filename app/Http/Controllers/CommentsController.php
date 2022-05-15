<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Comments;

class CommentsController extends Controller
{

    public function show($id)
    {

        $item =Comments::find($id);
        if($item){

        return response()->json(['Comments'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Comments::all();


        return response()->json(['Comments'=>$item], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'ParentCommentid' => 'required',
            'Boby' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Comments();
        //$item->Authorld=$req->Authorld;
        $item->ParentCommentid=$req->ParentCommentid;
       // $item->TicketID=$req->TicketID;
        $item->Boby=$req->Boby;
        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
    }
}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'ParentCommentid' => 'required',
            'Boby' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Comments::find($id);

        if($item){
            //$item->Authorld=$req->Authorld;
            $item->ParentCommentid=$req->ParentCommentid;
            //$item->TicketID=$req->TicketID;
            $item->Boby=$req->Boby;
        $item->update();
        return response()->json(['message'=>'done','status' => 200]);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404]);
                }
            }
    }
    public function destroy($id)
    {

        $item =Comments::find($id);
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

