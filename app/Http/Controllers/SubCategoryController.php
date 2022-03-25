<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{

    public function show($id)
    {

        $item =SubCategory::find($id);
        if($item){

        return response()->json(['SubCategory'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =SubCategory::all();

        return response()->json(['SubCategory'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new SubCategory();
        //$item->categoryid=$req->categoryid; 
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->is_default=$req->is_default;
        $item->is_client_visible=$req->is_client_visible;
        $item->external_code=$req->external_code;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =SubCategory::find($id);

        if($item){
            //$item->categoryid=$req->categoryid; 
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
            $item->is_default=$req->is_default;
            $item->is_client_visible=$req->is_client_visible;
            $item->external_code=$req->external_code;
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

        $item =SubCategory::find($id);
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

