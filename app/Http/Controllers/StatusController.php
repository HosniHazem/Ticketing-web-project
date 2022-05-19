<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Validator;
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
            'Is_Active' => 'required',

            'Is_Closed' => 'required',
            'Is_Client_Visible' => 'required',
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
        $item->Is_Active=$req->Is_Active;
        $item->Is_Closed=$req->Is_Closed;

        $item->Is_Client_Visible=$req->Is_Client_Visible;
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
            'Is_Active' => 'required',

            'Is_Closed' => 'required',
            'Is_Client_Visible' => 'required',
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
            $item->Is_Active=$req->Is_Active;
            $item->Is_Closed=$req->Is_Closed;

            $item->Is_Client_Visible=$req->Is_Client_Visible;
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

