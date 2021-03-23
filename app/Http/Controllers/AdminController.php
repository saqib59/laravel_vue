<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use App\Models\User;
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
        $this->deleteFileFromServer($picName, false);
       
        return 'done';
    }
    public function deleteFileFromServer($picName, $hasFullPath = false){
        if (!$hasFullPath) {
            $picPath = public_path().'/uploads/'.$picName;
        }
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
        /* first delete the file from the server */
        $this->deleteFileFromServer($request->IconName);
        $this->validate($request,[
            'id'   => 'required',
        ]);
        return Category::where('id', $request->id)->delete();
    }
        /* USER CONTROLLERS */

    public function createUser(Request $request){
        $this->validate($request,[
            'fullName'   => 'required',
            'email'   => 'required|email|unique:users',
            'autopassword'   => 'required',
            'userRole'   => 'required'
        ]);
        $password = bcrypt($request->autopassword);
        return User::create([
            'fullname' => $request->fullName,
            'email'     => $request->email,
            'userRole'     => $request->userRole,
            'password'     => $password,
        ]);
    }
     /*get users*/
    public function getUsers(Request $request){
    	return response()->json([
            "users"=> User::orderBy('id','desc')->get()
    	],200);
    }
    /* edit user */
    public function editUser(Request $request){
        $this->validate($request,[
            'fullName'   => 'required',
            'email'   => "required|email|unique:users,email, $request->id" ,
            'userRole'   => 'required'
        ]);
         $data = [
            'fullname' => $request->fullName,
            'email'     => $request->email,
            'userRole'     => $request->userRole,
        ];
        if ($request->password) {
            $password = bcrypt($request->autopassword);
            $data['password'] = $password;
        }
        return User::where('id', $request->id)->update($data);
    }
    
}
 
