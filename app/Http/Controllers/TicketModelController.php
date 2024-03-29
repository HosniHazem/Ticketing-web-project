<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketModels;
use Illuminate\Support\Facades\Validator;


class TicketModelController extends Controller
{

    public function show($id)
    {

        $item =TicketModels::find($id);
        if($item){

        return response()->json(['TicketModel'=>$item,'status' => 200], 200);
        }
    else
    {
    return response()->json(['message'=>'not found','status' => 200], 404);
    }
    }

    public function index()
    {

        $item =TicketModels::all();

        return response()->json(['TicketModel'=>$item,'status' => 200], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_Active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new TicketModels();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_Active=$req->Is_Active;
        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
    }
}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_Active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =TicketModels::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_Active=$req->Is_Active;
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

        $item =TicketModels::find($id);
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

