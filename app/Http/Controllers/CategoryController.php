<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function show($id)
    {

        $item =Category::find($id);
        if($item){

        return response()->json(['Category'=>$item,'status'=>200], 200);
        }
    else
    {
    return response()->json(['message'=>'not found','status'=>404], 404);
    }
    }

    public function index()
    {

        $item =Category::all();

        return response()->json(['Category'=>$item,'status'=>200], 200);
    }

    public function store(Request $req)
    {
        $item =new Category();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_Active=$req->Is_Active;
        $item->external_code=$req->external_code;
        $item->Is_Defaults=$req->Is_Defaults;
        $item->Is_Client_Visible=$req->Is_Client_Visible;
        $item->save();
        return response()->json(['message'=>'done','status'=>200], 200);
    }
    public function update(Request $req,$id)
    {
        $item =Category::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_Active=$req->Is_Active;
            $item->external_code=$req->external_code;
            $item->Is_Defaults=$req->Is_Defaults;
            $item->Is_Client_Visible=$req->Is_Client_Visible;
        $item->update();
        return response()->json(['message'=>'done','status'=>200], 200);
                }
                else
                {
                return response()->json(['message'=>'not done','status'=>404], 404);
                }
    }
    public function destroy($id)
    {

        $item =Category::find($id);
        if($item){
        $item->delete();
        return response()->json(['message'=>'deleted','status'=>200], 200);
                }
                else
                {
                return response()->json(['message'=>'not deleted','status'=>404], 404);
                }
    }
}

