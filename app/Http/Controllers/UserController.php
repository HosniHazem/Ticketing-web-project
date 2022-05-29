<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function show($id)
    {

        $item =User::find($id);
        if($item){

        return response()->json(['User'=>$item], 200);
        }
    else
    {
    return response()->json(['message'=>'not found'], 404);
    }
    }
    public function uploadimage(Request $request)
    {



            $file      = $request->file('attach');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = $filename;
            //move image to public/img folder
            $file->move(public_path('images/uploads'), $picture);
            return response()->json(["message" => "Image Uploaded Succesfully",'status' => 200]);




    }
    public function index()
    {

        $item =User::all();

        return response()->json(['User'=>$item], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone_no' => 'required',
            'organization' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new User();
       //$item->RoleID=$req->RoleID;
       $item->name=$req->name;
       $item->email=$req->email;
       $item->email_verified_at=$req->email_verified_at;
       $item->password=$req->password;


       $item->city=$req->city;
       $item->state=$req->state;
       $item->country=$req->country;
       $item->pin_code=$req->pin_code;
       $item->job_title=$req->job_title;
       $item->address=$req->address;
       $item->time_zone_id=$req->time_zone_id;
       $item->organization=$req->organization;
       $item->Is_Sendmail_Password=$req->Is_Sendmail_Password;
       $item->description=$req->description;
       $item->profile_picture=$req->profile_picture;
       $item->Is_Active=$req->Is_Active;
       $item->external_code=$req->external_code;
       $item->company_id=$req->company_id;

        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
    }
}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone_no' => 'required',
            'organization' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =User::find($id);


        if($item){
            //$item->RoleID=$req->RoleID;
            $item->name=$req->name;




            $item->phone_no=$req->phone_no;
            $item->city=$req->city;

            $item->country=$req->country;




            $item->organization=$req->organization;


            $item->profile_picture=$req->profile_picture;
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

        $item =User::find($id);
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

