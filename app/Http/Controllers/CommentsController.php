<?php

namespace App\Http\Controllers;

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
        $item =new Comments();
        //$item->Authorld=$req->Authorld; 
        $item->ParentCommentid=$req->ParentCommentid;
       // $item->TicketID=$req->TicketID; 
        $item->Boby=$req->Boby;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =Comments::find($id);

        if($item){
            //$item->Authorld=$req->Authorld;
            $item->ParentCommentid=$req->ParentCommentid;
            //$item->TicketID=$req->TicketID; 
            $item->Boby=$req->Boby;
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

