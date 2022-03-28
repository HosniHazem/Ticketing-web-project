<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $item->is_sendmail_password=$req->is_sendmail_password;
        $item->description=$req->description;
        $item->profile_picture=$req->profile_picture;
        $item->is_active=$req->is_active;
        $item->external_code=$req->external_code;
        $item->company_id=$req->company_id;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
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
            $item->is_sendmail_password=$req->is_sendmail_password;
            $item->description=$req->description;
            $item->profile_picture=$req->profile_picture;
            $item->is_active=$req->is_active;
            $item->external_code=$req->external_code;
            $item->company_id=$req->company_id;
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

