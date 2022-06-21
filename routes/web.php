<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CatagoryController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category Controller
Route::get ('/catagory/all',[CatagoryController::class, 'AllCat'])->name('all.cat');
Route::post('/catagory/add',[CatagoryController::class, 'AddCat'])->name('store.category');
Route::get ('/catagory/edit/{id}',[CatagoryController::class, 'edit']);
Route::post ('/catagory/update/{id}',[CatagoryController::class, 'update']);
Route::get ('softdelete/catagory/{id}',[CatagoryController::class, 'softDelete']);
Route::get ('catagory/restore/{id}',[CatagoryController::class, 'restore']);
Route::get ('catagory/permanentDelete/{id}',[CatagoryController::class, 'permanentDelete']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        
        // $users = user::all(); // fatch data from database using eloquent ORM
        $users = DB::table('users')->get(); //fatch data from database using query builder

        return view('dashboard',compact('users'));
    })->name('dashboard');
});
