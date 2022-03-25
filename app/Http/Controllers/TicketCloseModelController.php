<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketCloseModel;

class TicketCloseModelController extends Controller
{

    public function show($id)
    {

        $item =TicketCloseModel::find($id);
        if($item){

        return response()->json(['TicketCloseModel'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =TicketCloseModel::all();

        return response()->json(['TicketCloseModel'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new TicketCloseModel();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->is_default=$req->is_default;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =TicketCloseModel::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_default=$req->is_default;
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

        $item =TicketCloseModel::find($id);
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

