<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
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
    // return view('welcome');

    // $brands = DB::table('brands')->get();
    // return view('homepage',compact('brands'));
    return redirect()->route('home');
});

Auth::routes();

// Home Controller 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get ('/home/slider',[HomeController::class, 'homeSlider'])->name('home.slider');
Route::post('/slider/add',[HomeController::class, 'storeSlider'])->name('store.slider');

// Category Controller
Route::get ('/catagory/all',[CatagoryController::class, 'AllCat'])->name('all.cat');
Route::post('/catagory/add',[CatagoryController::class, 'AddCat'])->name('store.category');
Route::get ('/catagory/edit/{id}',[CatagoryController::class, 'edit']);
Route::post ('/catagory/update/{id}',[CatagoryController::class, 'update']);
Route::get ('softdelete/catagory/{id}',[CatagoryController::class, 'softDelete']);
Route::get ('catagory/restore/{id}',[CatagoryController::class, 'restore']);
Route::get ('catagory/permanentDelete/{id}',[CatagoryController::class, 'permanentDelete']);

// Brand Controller
Route::get ('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'storeBrand'])->name('store.brand');
Route::get ('/brand/edit/{id}',[BrandController::class, 'edit']);
Route::post ('/brand/update/{id}',[BrandController::class, 'update']);
Route::get ('/brand/delete/{id}',[BrandController::class, 'delete']);

// multi image
Route::get ('/multi/image',[BrandController::class, 'MultiPic'])->name('multi.image');
Route::post('/multipic/add',[BrandController::class, 'storeImg'])->name('store.image');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        
        // this is for default dashboard 
        // $users = user::all(); // fatch data from database using eloquent ORM
        // $users = DB::table('users')->get(); //fatch data from database using query builder
        // return view('dashboard',compact('users'));

        // this is for template dashboard 
        return view('admin.index');

    })->name('dashboard');
});

Route::get ('/user/logout',[BrandController::class, 'logout'])->name('user.logout');