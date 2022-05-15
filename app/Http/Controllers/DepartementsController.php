<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Validator;


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
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_Active' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Departments();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_active=$req->Is_active;
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
            'Is_Defaults' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Departments::find($id);

        if($item){
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_active=$req->Is_active;
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

