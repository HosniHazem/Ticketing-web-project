<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMembers;

class CategoryMembersController extends Controller
{

    public function show($id)
    {

        $item =CategoryMembers::find($id);
        if($item){

        return response()->json(['CategoryMembers'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =CategoryMembers::all();

        return response()->json(['CategoryMembers'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new CategoryMembers();
        $item->UserID=$req->UserID; //-
        $item->CategoryName=$req->CategoryName;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =CategoryMembers::find($id);

        if($item){
            $item->UserID=$req->UserID; //-
            $item->CategoryName=$req->CategoryName;
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

        $item =CategoryMembers::find($id);
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

