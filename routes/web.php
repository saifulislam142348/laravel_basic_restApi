<?php

use App\Http\Controllers\UserController;
use App\Models\District;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Response;

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
route::get('userInfo/',[UserController::class, 'userInfo']);
Route::get('/ajassx', [UserController::class, 'subCat']);

route::get('/ajax', function(){
    $cat_id= Input::get('catId');
    $subcatagory= District::where('division_id',  $cat_id )->get();
    return response::json( $subcatagory);
});
