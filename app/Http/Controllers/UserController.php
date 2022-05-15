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

    public function index()
    {

        $item =User::all();

        return response()->json(['User'=>$item], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'display_name' => 'required',
            'user_name' => 'required',
            'cell_phone_no' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pin_code' => 'required',
            'job_title' => 'required',
            'address' => 'required',
            'time_zone_id' => 'required',
            'Is_Sendmail_Password' => 'required',
            'description' => 'required',
            'profile_picture' => 'required',
            'Is_Active' => 'required',
            'external_code' => 'required',
            'company_id' => 'required',           
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
        $item->display_name=$req->display_name;
        $item->user_name=$req->user_name;
        $item->cell_phone_no=$req->cell_phone_no;
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
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'display_name' => 'required',
            'user_name' => 'required',
            'cell_phone_no' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pin_code' => 'required',
            'job_title' => 'required',
            'address' => 'required',
            'time_zone_id' => 'required',
            'Is_Sendmail_Password' => 'required',
            'description' => 'required',
            'profile_picture' => 'required',
            'Is_Active' => 'required',
            'external_code' => 'required',
            'company_id' => 'required',           
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
            $item->email=$req->email;
            $item->email_verified_at=$req->email_verified_at;
            $item->password=$req->password;
            $item->display_name=$req->display_name;
            $item->user_name=$req->user_name;
            $item->cell_phone_no=$req->cell_phone_no;
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

