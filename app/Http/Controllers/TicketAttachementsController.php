<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketAttachements;

class TicketAttachementsController extends Controller
{

    public function show($id)
    {

        $item =TicketAttachements::find($id);
        if($item){

        return response()->json(['Impact'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =TicketAttachements::all();

        return response()->json(['TicketAttachements'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new TicketAttachements();
        //$item->TicketID=$req->TicketID;
        $item->file_name=$req->FileName;
        $item->display_name=$req->DisplayName;
        $item->extension=$req->Extension;
        $item->file_size=$req->FileSize;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =TicketAttachements::find($id);

        if($item){
        //$item->TicketID=$req->TicketID;
        $item->file_name=$req->FileName;
        $item->display_name=$req->DisplayName;
        $item->extension=$req->Extension;
        $item->file_size=$req->FileSize;
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

        $item =TicketAttachements::find($id);
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

