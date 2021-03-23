<?php
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
/*TAG ROUTES*/
Route::post('app/create_tag',[App\Http\Controllers\AdminController::class, 'addTag']);
Route::get('app/get_tags',[App\Http\Controllers\AdminController::class, 'getTags']);
Route::post('app/edit_tag',[App\Http\Controllers\AdminController::class, 'editTag']);
Route::post('app/delete_tag',[App\Http\Controllers\AdminController::class, 'deleteTag']);


/*category routes*/
Route::post('app/upload',[App\Http\Controllers\AdminController::class, 'upload']);
Route::post('app/delete_image',[App\Http\Controllers\AdminController::class, 'deleteImage']);
Route::post('app/create_category',[App\Http\Controllers\AdminController::class, 'createCategory']);
Route::get('app/get_categories',[App\Http\Controllers\AdminController::class, 'getCategories']);
Route::post('app/edit_category',[App\Http\Controllers\AdminController::class, 'editCategory']);
Route::post('app/delete_category',[App\Http\Controllers\AdminController::class, 'deleteCategory']);

/* User Routes */

Route::post('app/create_user',[App\Http\Controllers\AdminController::class, 'createUser']);
Route::get('app/get_users',[App\Http\Controllers\AdminController::class, 'getUsers']);
Route::post('app/edit_user',[App\Http\Controllers\AdminController::class, 'editUser']);

Route::get('/', function () {
    return view('welcome');
});
Route::any('{slug}', function () {
    return view('welcome');
});


// Route::get('current_tasks', 'TaskController@index');
// Route::get('archived_tasks', 'TaskController@archived');
// Route::post('create_task', 'TaskController@store');
// Route::post('delete_task/{id}', 'TaskController@destroy');
// Route::post('archive_task/{id}', 'TaskController@archive');
// Route::post('edit_task', 'TaskController@edit');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
