<?php
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormSubmissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
// Route::post('form', '\App\Http\Controllers\PostController@create')->name('form.submit')->middleware('auth');
Route::get('/form', '\App\Http\Controllers\TodoController@index')->name('toDoForm.index')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
/* ADMIN ROUTES START */
/*TAG ROUTES*/

Route::prefix('app')->middleware(AdminCheck::class)->group(function(){
    Route::post('/create_tag',[App\Http\Controllers\AdminController::class, 'addTag']);
    Route::get('/get_tags',[App\Http\Controllers\AdminController::class, 'getTags']);
    Route::post('/edit_tag',[App\Http\Controllers\AdminController::class, 'editTag']);
    Route::post('/delete_tag',[App\Http\Controllers\AdminController::class, 'deleteTag']);


    /*category routes*/
    Route::post('/upload',[App\Http\Controllers\AdminController::class, 'upload']);
    Route::post('/delete_image',[App\Http\Controllers\AdminController::class, 'deleteImage']);
    Route::post('/create_category',[App\Http\Controllers\AdminController::class, 'createCategory']);
    Route::get('/get_categories',[App\Http\Controllers\AdminController::class, 'getCategories']);
    Route::post('/edit_category',[App\Http\Controllers\AdminController::class, 'editCategory']);
    Route::post('/delete_category',[App\Http\Controllers\AdminController::class, 'deleteCategory']);

    /* User Routes */

    Route::post('/create_user',[App\Http\Controllers\AdminController::class, 'createUser']);
    Route::get('/get_users',[App\Http\Controllers\AdminController::class, 'getUsers']);
    Route::post('/edit_user',[App\Http\Controllers\AdminController::class, 'editUser']);
    Route::post('/edit_user',[App\Http\Controllers\AdminController::class, 'editUser']);


    /* Role management */
    Route::post('/create_role',[App\Http\Controllers\AdminController::class, 'createRole']);
    Route::post('/edit_role',[App\Http\Controllers\AdminController::class, 'editRole']);
    Route::get('/get_roles',[App\Http\Controllers\AdminController::class, 'getRoles']);
    Route::post('/assign_roles',[App\Http\Controllers\AdminController::class, 'assignRoles']);

    /* add a design */
    Route::post('/add_design',[App\Http\Controllers\AdminController::class, 'addDesign']);

    Route::post('/admin_login',[App\Http\Controllers\AdminController::class, 'adminLogin']);

});
// Route::get('/create_slug',[App\Http\Controllers\AdminController::class, 'slug_generate']);

Route::get('/',[App\Http\Controllers\AdminController::class, 'index']);
Route::get('blog_data',[App\Http\Controllers\AdminController::class, 'designListing']);
Route::get('/logout',[App\Http\Controllers\AdminController::class, 'logout']);

/* ADMIN ROUTES END */

Route::any('{slug}',[App\Http\Controllers\AdminController::class, 'index'])->where('path', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::any('{slug}', function () {
//     return view('welcome');
// });


// Route::get('current_tasks', 'TaskController@index');
// Route::get('archived_tasks', 'TaskController@archived');
// Route::post('create_task', 'TaskController@store');
// Route::post('delete_task/{id}', 'TaskController@destroy');
// Route::post('archive_task/{id}', 'TaskController@archive');
// Route::post('edit_task', 'TaskController@edit');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
