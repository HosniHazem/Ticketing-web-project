<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketCloseModel;
use Illuminate\Support\Facades\Validator;


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
        
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_active' => 'required',
            'Is_default' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new TicketCloseModel();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->is_default=$req->is_default;
        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
        }
}
    public function update(Request $req,$id)
    {        
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_active' => 'required',
            'Is_default' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =TicketCloseModel::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_default=$req->is_default;
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

