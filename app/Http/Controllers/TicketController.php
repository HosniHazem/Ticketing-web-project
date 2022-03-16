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
        $item->DisplayTicketID=$req->DisplayTicketID;
        $item->Subject=$req->Subject;
        $item->Description=$req->Description;
        $item->save();
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
