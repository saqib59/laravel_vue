<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Role;
use App\Models\Tags;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request){
        
        // first check if you are logged in and admin user ...
        if(!Auth::check() && $request->path() != 'login'){ //if Auth::check() returns 1 it means user is logged in
            return redirect('/login');
        }
        if(!Auth::check() && $request->path() == 'login'){
            return view('welcome');
        }
        // if user logged in and is admin
        $user = Auth::user();
        if ($user->role->isAdmin == 0) {

            return redirect('/login');
        }
        if($request->path() == 'login'){
            return redirect('/');
        }
        return $this->checkForPermission($request, $user);

        return view('/welcome');
    }

    public function checkForPermission($request,$user){
        $permission = json_decode($user->role->permissions);
        $has_permission = false;
        if(!$permission) return view('welcome');
        foreach($permission as $p ){
            if ($p->name == $request->path()) {
                if($p->read){
                    $has_permission = true;
                }

            }
        }
        if($has_permission) return view('welcome');
        return abort(404);
    }
    /* admin logout */
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

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
            'fullname'   => 'required',
            'email'   => 'required|email|unique:users',
            'autopassword'   => 'required',
            'role_id'   => 'required'
        ]);
        $password = bcrypt($request->autopassword);
        return User::create([
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'role_id'       => $request->role_id,
            'password'      => $password,
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
            'fullname'   => 'required',
            'email'   => "required|email|unique:users,email, $request->id" ,
            'role_id'   => 'required'
        ]);
         $data = [
            'fullname' => $request->fullname,
            'email'     => $request->email,
            'role_id'     => $request->role_id,
        ];
        if ($request->password) {
            $password = bcrypt($request->autopassword);
            $data['password'] = $password;
        }
        return User::where('id', $request->id)->update($data);
    }
    /* admin login */
    public function adminLogin(Request $request){
        $this->validate($request,[
            'email'     => "email|required",
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {
            $user = Auth::user();
            if ($user->role->isAdmin == 0) {
                Auth::logout();
                return response()->json([
                    'msg' => 'Incorrect credentials',
                ],401);
            }
            return response()->json([
                'msg' => 'You are logged in',
            ]);
        }
        else{
            return response()->json([
                'msg' => 'Incorrect credentials',
            ],401);

        }
         $data = [
            'fullname' => $request->fullname,
            'email'     => $request->email,
            'userRole'     => $request->userRole,
        ];
        if ($request->password) {
            $password = bcrypt($request->autopassword);
            $data['password'] = $password;
        }
        return User::where('id', $request->id)->update($data);
    }
    /* create role */
    public function createRole(Request $request){
        $this->validate($request,[
            'roleName'   => 'required'
        ]);
            return Role::create([
                'roleName'   => $request->roleName
            ]);
    }
    /* get roles */
    public function getRoles(Request $request){
        return response()->json([
            "roles"=> Role::all()
        ],200);
    }
    /*edit role*/
    public function editRole(Request $request){
        $this->validate($request,[
            'roleName'   => 'required',
        ]);
        return Role::where('id', $request->id)->update([
            'roleName' => $request->roleName
        ]);
    }
    /* assign roles */
    public function assignRoles(Request $request){
        $this->validate($request,[
            'id'            => 'required',
            'permissions'   => 'required',
        ]);
        return Role::where('id', $request->id)->update([
            'permissions' => $request->permissions
        ]);
    }

    /* add a new design */
    public function addDesign(Request $request){
        $this->validate($request,[
            'title'   => 'required',
            'featuredImage'   => 'required'
        ]);
    	return Blog::create([
    		'title' => $request->title,
            'post'     => $request->projectName,
            'slug'     => $request->projectName,
            'user_id'     => 0,
            'views'     => 0,
            'featuredImage' => $request->featuredImage,
            'metaDescription' => $request->metaDescription,
    	]);
    }
}
 
