<?php

namespace App\Http\Controllers;

use App\Models\Request_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RequestTypeController extends Controller
{

    public function show($id)
    {

        $item =Request_type::find($id);
        if($item){

        return response()->json(['RequestType'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Request_type::all();

        return response()->json(['RequestType'=>$item], 200);
    }

    public function store(Request $req)
    {
        
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
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
        $item =new Request_type();
        $item->name=$req->name;
        $item->description=$req->description;
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
        $item =Request_type::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_Defaults=$req->is_Defaults;
            $item->is_client_visible=$req->is_client_visible;
            $item->update();
        return response()->json(['message'=>'done','status' => 200]);
                }
                else
                {
                return response()->json(['message'=>'not done','status' => 200]);
                }
            }
    }
    public function destroy($id)
    {

        $item =Request_type::find($id);
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

