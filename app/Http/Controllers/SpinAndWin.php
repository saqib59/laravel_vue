<?php

namespace App\Http\Controllers;

use App\Models\Siteitem;
use App\Models\Siterecord;
use Illuminate\Http\Request;

class SpinAndWin extends Controller
{
      /* SPIN AND WIN APIS */
      public function createTokenSpinnWin(Request $request){
        $this->validate($request,[
            'url' => 'required|url|unique:siterecords',
            'token' => 'required',
            'user_id' => 'required'
        ],[
            'url.unique'     => 'This url is already registered',
        ]
    );
        return Siterecord::create([
            'user_id' => $request->user_id,
            'url' => $request->url,
            'token' => $request->token
        ]);
    }
    /* get registered apps */
    
    public function getSiteRecords(Request $request){
        return response()->json([
            "registered_apps"=> Siterecord::all()
        ],200);
    }
    /* Add items to games */
    public function InsertItems(Request $request){
        // $task_array = json_decode($request);
        $response = [];
        $all_items = count($request->all_items);
        if($all_items < 12 || $all_items > 13){
            $response['error'] = "All 12 items needs to be inserted";
            return $response;
        }
       
        else{

            return Siteitem::create([
                'token' => $request->token,
                'items' => json_encode($request->all_items),
            ]);
        }
    }
    /* get items */
    public function getItems(Request $request){
        // $task_array = json_decode($request);
        try {
            $items = Siteitem::where('token', $request->token)->first();
            $items = json_decode($items->items);
            return $items;

        } catch (\Throwable $th) {
            $response['error'] = "No items found";
            return $response;
        }
    }
}
