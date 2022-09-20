<?php

namespace App\Http\Controllers;

use App\Models\division;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function userInfo(){
        $catagory = division::get();

        return view('userInfo', compact('catagory'));
    }

    public function subCat()
    {
         
    

      
    }
}

