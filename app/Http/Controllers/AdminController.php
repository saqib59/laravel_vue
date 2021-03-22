<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use App\Models\Category;
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
     /* CATEGORY CONTROLLERS */
     /* category image */
    public function upload(Request $request){
        $this->validate($request,[
            'file'   => 'required|mimes:jpeg,jpg,png',
        ]);
        $picName = time(). $request->file->extension();
        $request->file->move(public_path('uploads'), $picName); 
        return $picName;
    }
    public function deleteImage(Request $request){
        $picName = $request->imageName;
        $this->deleteFileFromServer($picName);
       
        return 'done';
    }
    public function deleteFileFromServer($picName){
        $picPath = public_path().'/uploads/'.$picName;
        if (file_exists($picPath)) {
            @unlink($picPath);
        }
        return 'done';
    }
    /* create category */
    public function createCategory(Request $request){
        $this->validate($request,[
            'categoryName'   => 'required',
            'IconName'   => 'required'
        ]);
    	return Category::create([
    		'categoryName' => $request->categoryName,
            'IconName'     => $request->IconName  
    	]);
    }
    /*get categories*/
    public function getCategories(Request $request){
    	return response()->json([
            "categories"=> Category::orderBy('id','desc')->get()
    	],200);
    }
    /* edit category */
    public function editCategory(Request $request){
        $this->validate($request,[
            'id'   => 'required',
            'categoryName'   => 'required',
            'IconName'   => 'required',
        ]);
        return Category::where('id', $request->id)->update([
            'categoryName' => $request->categoryName,
            'IconName' => $request->IconName,
        ]);
    }
    /* delete category */
    public function deleteCategory(Request $request){
        $this->validate($request,[
            'id'   => 'required',
        ]);
        return Category::where('id', $request->id)->delete();
    }
}
 