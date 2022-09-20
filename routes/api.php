<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestControlller;


// show user
route::get('/users/{id?}',[RestControlller::class, 'getUser']);

// single user add
route::post('users/add',[RestControlller::class, 'addUser']);

// multiple user add
route::post('users/multipleadd',[RestControlller::class, 'multiple']);

// update user using put
route::put('update-user/{id}',[RestControlller::class, 'updateUser']);

// update user using patch
route::patch('update/{id}',[RestControlller::class, 'updateUserPatch']);

// single data delete 

route::delete('delete/{id}',[RestControlller::class, 'userDelete']);

// multiple user data delete
route::delete('deleteall/{ids}',[RestControlller::class, 'userDeleteall']);


// multiple user data delete using json
route::delete('deletejson/',[RestControlller::class, 'userDeletejson']);
