<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RestControlller extends Controller
{
    public function getUser($id = null)
    {

        if ($id == '') {

            $users = usertable::get();
            return response()->json(['users' => $users], 200);
        } else {
            $users = usertable::find($id);
            return response()->json(['users' => $users], 200);
        }
    }

    public function addUser(request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:usertables',
                'password' => 'required',
            ];
            $rulecustom = [
                'name.required' => 'name required',
                'email.required' => 'email required',
                'email.email' => 'must be email ',
                'email.unique' => 'email  already exits',
                'password.required' => 'password required',
            ];
            $err = validator::make($data, $rules, $rulecustom);
            if ($err->fails()) {
                return response()->json($err->errors(), 422);
            }
            $users = new usertable();
            $users->name = $data['name'];
            $users->email = $data['email'];
            $users->password = hash::make($data['password']);
            // $users->password = bcrypt($data['password']);
            $users->save();

            $msg = 'insert successfully';
            return response()->json(['msg' => $msg], 201);
        }
    }



    public function multiple(request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'usertables.*.name' => 'required',
                'usertables.*.email' => 'required|email|unique:usertables',
                'usertables.*.password' => 'required',
            ];
            $rulecustom = [
                'usertables.*.name.required' => 'name required',
                'usertables.*.email.required' => 'email required',
                'usertables.*.email.email' => 'must be email ',
                'usertables.*.email.unique' => 'email  already exits',
                'usertables.*.password.required' => 'password required',
            ];
            $err = validator::make($data, $rules, $rulecustom);
            if ($err->fails()) {
                return response()->json($err->errors(), 422);
            }

          

             
            foreach ($data['users'] as $multipleUser) {
                $users = new usertable();
                $users->name = $multipleUser['name'];
                $users->email = $multipleUser['email'];
                $users->password = hash::make($multipleUser['password']);
                // $users->password = bcrypt($data['password']);
                $users->save();

                $msg = 'insert successfully';
               
            }
            return response()->json(['msg' => $msg], 201); 
        }
    
    }


    // update user 
    public function updateUser(request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
            
                'password' => 'required',
            ];
            $rulecustom = [
                'name.required' => 'name required',
                'password.required' => 'password required',
            ];
            $err = validator::make($data, $rules, $rulecustom);
            if ($err->fails()) {
                return response()->json($err->errors(), 422);
            }
            $users = usertable::find($id);
            $users->name = $data['name'];
            $users->password = hash::make($data['password']);
            // $users->password = bcrypt($data['password']);
            $users->save();

            $msg = 'insert successfully update';
            return response()->json(['msg' => $msg], 202);
        }
    }
    // update user 
    public function updateUserPatch(request $request, $id)
    {
        if ($request->isMethod('patch')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
            
               
            ];
            $rulecustom = [
                'name.required' => 'name required',
              
            ];
            $err = validator::make($data, $rules, $rulecustom);
            if ($err->fails()) {
                return response()->json($err->errors(), 422);
            }
            $users = usertable::find($id);
            $users->name = $data['name'];
            
            // $users->password = bcrypt($data['password']);
            $users->save();

            $msg = 'insert successfully update name';
            return response()->json(['msg' => $msg], 202);
        }
    }

    public function userDelete($id=null){

     usertable::findOrFail($id)->delete();
        $msg = 'single user  delete successfully ';
        return response()->json(['msg' => $msg], 200);

    }

    public function userDeleteall($ids){

        $ids= explode(',', $ids);
        usertable::whereIn('id', $ids)->delete();
        $msg = 'user all delete successfully ';
        return response()->json(['msg' => $msg], 200);
    }

    public function userDeletejson(Request $request){

        if($request->isMethod('delete')){
            $data= $request->all();

            usertable::whereIn('id',$data['ids'])->delete();
            $msg = ' json using user all delete successfully ';
        return response()->json(['msg' => $msg], 200);
        }
    }
}
