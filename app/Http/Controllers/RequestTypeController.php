<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request_type;

class RequestTypeController extends Controller
{

    public function show($id)
    {

        $item =RequestType::find($id);
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

        $item =RequestType::all();

        return response()->json(['RequestType'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new RequestType();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->is_Defaults=$req->is_Defaults;
        $item->is_client_visible=$req->is_client_visible;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =RequestType::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_Defaults=$req->is_Defaults;
            $item->is_client_visible=$req->is_client_visible;
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

        $item =RequestType::find($id);
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

