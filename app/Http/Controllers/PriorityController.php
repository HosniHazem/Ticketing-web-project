<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;
use Illuminate\Support\Facades\Validator;


class PriorityController extends Controller
{

    public function show($id)
    {

        $item =Priority::find($id);
        if($item){

        return response()->json(['Priority'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Priority::all();

        return response()->json(['Priority'=>$item], 200);
    }

    public function store(Request $req)
    {        
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'is_active' => 'required',
            'is_default' => 'required',
            'is_client_visible' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Priority();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->color=$req->color;
        $item->is_active=$req->is_active;
        $item->is_Defaults=$req->is_Defaults;
        $item->is_client_visible=$req->is_client_visible;
        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
    }
}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'is_active' => 'required',
            'is_default' => 'required',
            'is_client_visible' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Priority::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->color=$req->color;
            $item->is_active=$req->is_active;
            $item->is_Defaults=$req->is_Defaults;
            $item->is_client_visible=$req->is_client_visible;
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

        $item =Priority::find($id);
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

