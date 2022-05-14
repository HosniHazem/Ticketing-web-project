<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{

    public function show($id)
    {

        $item =Status::find($id);
        if($item){

        return response()->json(['Status'=>$item,'status' => 200]);
        }
    else
    {
    return response()->json(['message'=>'not found','status' => 404], 404);
    }
    }

    public function index()
    {

        $item =Status::all();

        return response()->json(['Status'=>$item,'status' => 200], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'is_default' => 'required',
            'is_closed' => 'required',
            'is_client_visible' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Status();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->is_closed=$req->is_closed;
        $item->is_default=$req->is_default;
        $item->is_client_visible=$req->is_client_visible;
        $item->save();
        }
        return response()->json(['message'=>'done','status' => 200], 200);
    }
    public function update(Request $req,$id)
    {
        $item =Status::find($id);

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'is_default' => 'required',
            'is_closed' => 'required',
            'is_client_visible' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_closed=$req->is_closed;
            $item->is_default=$req->is_default;
            $item->is_client_visible=$req->is_client_visible;
        $item->update();
        return response()->json(['message'=>'done','status' => 200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 404], 404);
                }
            }
    }
    public function destroy($id)
    {

        $item =Status::find($id);
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

