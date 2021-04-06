<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Siteitem;
use App\Models\Siterecord;
use App\Models\Spincount;
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

    /* spin wheel to count spins */
    public function spinWheel(Request $request){
    //     $request->validate([
    //         'user_id' => 'required',
    //         'token' => 'required',
    //     ]
    // );
        $spin_count = Spincount::select('spin_count')->where('user_id', $request->user_id)->where('token', $request->token)->first();
        if(empty($spin_count) ) {
            return Spincount::create([
                'user_id' => $request->user_id,
                'token' => $request->token,
                'spin_count' => "1",
            ]);
         }
        else{
            $count = $spin_count->spin_count;
            return Spincount::where('user_id', $request->user_id)->where('token', $request->token)->update([
                'spin_count' => ++$count,
            ]);
        }
    }

    /* save prize */
    public function storePrize(Request $request){
         try {
            return Prize::create([
                'user_id' => $request->user_id,
                'prize' => $request->prize,
                'token' => $request->token,
            ]);
        } catch (\Throwable $th) {
            $response['error'] = "Oops! Something Went Wrong";
            return $response;
        }
    }

    /* save prize */
    public function getUserPrize(Request $request){
        try {
            $prizes = Prize::select('prize')->where('user_id', $request->user_id)->where('token', $request->token)->get();
            return $prizes;

        } catch (\Throwable $th) {
            $response['error'] = "No prize found for this user";
            return $response;
        }
   }

    
}
