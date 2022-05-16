<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketAttachements;
use Illuminate\Support\Facades\Validator;


class TicketAttachementsController extends Controller
{

    public function show($id)
    {

        $item =TicketAttachements::find($id);
        if($item){

        return response()->json(['TicketAttachements'=>$item,'status' => 200], 200);
        }
    else
    {
    return response()->json(['message'=>'not found','status' => 404], 404);
    }
    }

    public function index()
    {

        $item =TicketAttachements::all();

        return response()->json(['TicketAttachements'=>$item,'status' => 200], 200);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file_name' => 'required',
            'display_name' => 'required',
            'extension' => 'required',
            'file_size' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =new TicketAttachements();
        //$item->TicketID=$req->TicketID;
        $item->file_name=$req->FileName;
        $item->display_name=$req->DisplayName;
        $item->extension=$req->Extension;
        $item->file_size=$req->FileSize;
        $item->save();
        return response()->json(['message'=>'done','status' => 200]);
    }
}
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'file_name' => 'required',
            'display_name' => 'required',
            'extension' => 'required',
            'file_size' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'validate_err' => $validator->getMessageBag(),
            ]);
        } else {
        $item =TicketAttachements::find($id);

        if($item){
        //$item->TicketID=$req->TicketID;
        $item->file_name=$req->FileName;
        $item->display_name=$req->DisplayName;
        $item->extension=$req->Extension;
        $item->file_size=$req->FileSize;
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

        $item =TicketAttachements::find($id);
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

