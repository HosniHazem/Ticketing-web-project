<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

class DepartementsController extends Controller
{

    public function show($id)
    {

        $item =Departments::find($id);
        if($item){

        return response()->json(['Departments'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Departments::all();

        return response()->json(['Departments'=>$item], 200);
    }

    public function store(Request $req)
    {
        $item =new Departments();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->is_active=$req->is_active;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =Departments::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->is_active=$req->is_active;
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

        $item =Departments::find($id);
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

