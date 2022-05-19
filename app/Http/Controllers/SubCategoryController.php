<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{

    public function show($id)
    {

        $item =SubCategory::find($id);
        if($item){

        return response()->json(['SubCategory'=>$item,'status' => 200], 200);
        }
    else
    {
    return response()->json(['message'=>'not found','status' => 404], 404);
    }
    }

    public function category()
    {
        $category = Category::all();
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }


    public function index()
    {

        // $item =SubCategory::all();
        $item = SubCategory::with('category')->get();
        return response()->json(['SubCategory'=>$item,'status' => 200], 200);
    }


    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_Active' => 'required',
            'category_id' => 'required',
            'Is_Client_Visible' => 'required',
            'external_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new SubCategory();
        $item->category_id=$req->category_id;
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_Active=$req->Is_Active;

        $item->Is_Client_Visible=$req->Is_Client_Visible;
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
            'Is_Active' => 'required',

            'Is_Client_Visible' => 'required',
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
            $item->category_id=$req->category_id;
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_Active=$req->Is_Active;

            $item->Is_Client_Visible=$req->Is_Client_Visible;
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

