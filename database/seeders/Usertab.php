<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\usertable;

class Usertab extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name'=>'saiful','email'=>'saiful@mail.com','password'=>'12345678'
            ],
            [
                'name'=>'saifule','email'=>'saifu4l@mail.com','password'=>'12345678'
            ]
            ];
            usertable::insert(  $users);
    }
}
