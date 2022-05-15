<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMembers;
use Illuminate\Support\Facades\Validator;


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
        $validator = Validator::make($req->all(), [
            'CategoryName' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new CategoryMembers();
        //$item->UserID=$req->UserID; 
        $item->CategoryName=$req->CategoryName;
        $item->save();
        return response()->json(['message'=>'done','status'=> 200]);
        }
    }
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'CategoryName' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =CategoryMembers::find($id);

        if($item){
        //    $item->UserID=$req->UserID; 
            $item->CategoryName=$req->CategoryName;
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

