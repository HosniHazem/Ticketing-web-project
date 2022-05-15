<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;


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
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_active' => 'required',
            'Is_default' => 'required',
            'Is_client_visible' => 'required',
            'external_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new SubCategory();
        //$item->categoryid=$req->categoryid; 
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_active=$req->Is_active;
        $item->Is_default=$req->Is_default;
        $item->Is_client_visible=$req->Is_client_visible;
        $item->external_code=$req->external_code;
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
            'Is_client_visible' => 'required',
            'external_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =SubCategory::find($id);

        if($item){
            //$item->categoryid=$req->categoryid; 
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_active=$req->Is_active;
            $item->Is_default=$req->Is_default;
            $item->Is_client_visible=$req->Is_client_visible;
            $item->external_code=$req->external_code;
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

