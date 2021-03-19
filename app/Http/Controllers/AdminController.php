<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*add tag*/
    public function addTag(Request $request){

        $this->validate($request,[
            'tagName'   => 'required'
        ]);
    	return Tags::create([
    		'tagName' => $request->tagName
    	]);
    }
    /*get tags*/
    public function getTags(Request $request){
    	return response()->json([
            "tags"=> Tags::orderBy('id','desc')->get()
    	],200);
    }
    /*edit tag*/
    public function editTag(Request $request){
        $this->validate($request,[
            'id'   => 'required',
            'tagName'   => 'required',
        ]);
        return Tags::where('id', $request->id)->update([
            'tagName' => $request->tagName
        ]);
    }
    /*delete tag*/
    public function deleteTag(Request $request){
        $this->validate($request,[
            'id'   => 'required',
        ]);
        return Tags::where('id', $request->id)->delete();
    }
    /*END TAG*/
    public function upload(Request $request){
        $picName = time(). $request->file->extension();
        $request->file->move(public_path('uploads'), $picName); 
        return $picName;
    }
}
 