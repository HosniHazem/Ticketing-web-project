<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impacts;
use Illuminate\Support\Facades\Validator;


class ImpactController extends Controller
{

    public function show($id)
    {

        $item =Impacts::find($id);
        if($item){

        return response()->json(['Impact'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }

    public function index()
    {

        $item =Impacts::all();

        return response()->json(['Impacts'=>$item], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'description' => 'required',
            'Is_Active' => 'required',

            'Is_Client_Visible' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new Impacts();
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_Active=$req->Is_Active;

        $item->Is_Client_Visible=$req->Is_Client_Visible;
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =Impacts::find($id);

        if($item){
        $item->name=$req->name;
        $item->description=$req->description;
        $item->Is_Active=$req->Is_Active;

        $item->Is_Client_Visible=$req->Is_Client_Visible;
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

        $item =Impacts::find($id);
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

