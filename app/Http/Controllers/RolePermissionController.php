<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{

    public function show($id)
    {

        $item =RolePermission::find($id);
        if($item){

        return response()->json(['RolePermission'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =RolePermission::all();

        return response()->json(['RolePermission'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new RolePermission();
        $item->RoleID=$req->RoleID; //-
        $item->MenuID=$req->MenuID;
        $item->Is_Full=$req->Is_Full;
        $item->Is_View=$req->Is_View;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =RolePermission::find($id);

        if($item){
        $item->RoleID=$req->RoleID; //-
        $item->MenuID=$req->MenuID;
        $item->Is_Full=$req->Is_Full;
        $item->Is_View=$req->Is_View;
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

        $item =RolePermission::find($id);
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

