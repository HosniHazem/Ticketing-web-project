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
        $item->DisplayName=$req->DisplayName;
        $item->UserName=$req->UserName;
        $item->Password=$req->Password;
        $item->Email=$req->Email;
        $item->PhoneNo=$req->PhoneNo;
        $item->CellPhoneNo=$req->CellPhoneNo;
        $item->City=$req->City;
        $item->State=$req->State;
        $item->Country=$req->Country;
        $item->Pincode=$req->Pincode;
        $item->JobTitle=$req->JobTitle;
        $item->Address=$req->Address;
        $item->TimeZoneID=$req->TimeZoneID;
        $item->Organization=$req->Organization;
        $item->Is_SendMail_Password=$req->Is_SendMail_Password;
        $item->Description=$req->Description;
        $item->ProfilePicture=$req->ProfilePicture;
        $item->Is_Active=$req->Is_Active;
        $item->CreatedDate=$req->CreatedDate;
        $item->ExternalCode=$req->ExternalCode;
        $item->Companyld=$req->Companyld;
        $item->save();
        return response()->json(['message'=>'done'], 200);
    }
    public function update(Request $req,$id)
    {
        $item =User::find($id);

        if($item){
            //$item->RoleID=$req->RoleID; 
            $item->DisplayName=$req->DisplayName;
            $item->UserName=$req->UserName;
            $item->Password=$req->Password;
            $item->Email=$req->Email;
            $item->PhoneNo=$req->PhoneNo;
            $item->CellPhoneNo=$req->CellPhoneNo;
            $item->City=$req->City;
            $item->State=$req->State;
            $item->Country=$req->Country;
            $item->Pincode=$req->Pincode;
            $item->JobTitle=$req->JobTitle;
            $item->Address=$req->Address;
            $item->TimeZoneID=$req->TimeZoneID;
            $item->Organization=$req->Organization;
            $item->Is_SendMail_Password=$req->Is_SendMail_Password;
            $item->Description=$req->Description;
            $item->ProfilePicture=$req->ProfilePicture;
            $item->Is_Active=$req->Is_Active;
            $item->CreatedDate=$req->CreatedDate;
            $item->ExternalCode=$req->ExternalCode;
            $item->Companyld=$req->Companyld;
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

