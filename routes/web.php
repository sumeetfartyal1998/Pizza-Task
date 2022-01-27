<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;
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
    return view('home');
});
Route::view('/register',"register");
Route::post('/register',[Main::class,"register"]);
Route::view('/login',"login");
Route::post('/login',[Main::class,"login"]);
Route::get('/menu',[Main::class,"menu"]);
Route::post('/addtocart',[Main::class,"addtocart"]);
Route::get('/cart',[Main::class,"cart"]);
Route::get('/checkout/{total}',function($total){
    return view('checkout')->with(['total'=>$total]);
});
Route::post('/checkout',[Main::class,"checkout"]);
Route::get('/logout',[Main::class,"logout"]);
