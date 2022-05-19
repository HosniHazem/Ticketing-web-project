<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Support\Facades\Validator;


class ItemsController extends Controller
{

    public function show($id)
    {

        $item =Items::find($id);
        if($item){

        return response()->json(['Items'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Items::all();

        return response()->json(['Items'=>$item], 200);
    }

    public function store(Request $req)
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
        $item =new Items();
     //   $item->Subcategoryid=$req->Subcategoryid;
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
            'is_active' => 'required',

            'is_client_visible' => 'required',
            'external_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Items::find($id);

        if($item){
        //    $item->Subcategoryid=$req->Subcategoryid;
            $item->name=$req->name;
            $item->description=$req->description;
            $item->Is_Active=$req->Is_Active;

            $item->is_client_visible=$req->is_client_visible;
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

        $item =Items::find($id);
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

