<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index($value='')
    {
    	$user = Auth::user()->id;
    	$userObj = new User;
    	$userData = $userObj->where('id',$user)->get()->first();
    	$data['user'] = $userData;
    	//dd($data);
    	return view('admin.users.index',compact('data'));
    }

    public function update(Request $request)
    {
    	$validaData =  [
            'name'     => 'required',
            'email'     => 'required|email',
        ];
    	$oldPassword = $request->post('old_password');
        $newPassword = $request->post('new_password');
        $confNewPassword = $request->post('confirm_password');
        if($oldPassword != ''){
            $validaData['new_password'] = 'required';
            $validaData['confirm_password'] = 'same:new_password';
        }
    	
        //if()
    	$validator = Validator::make($request->all(),$validaData);
        if ($validator->fails()) {
            $validationErrors =  $validator->errors();
            $res = [
              'status'   =>'validation_error',
              'data'     =>$validationErrors
            ];
            return  json_encode($res);
        }
        $user = User::find(auth()->user()->id);
        if ($oldPassword != '' && !Hash::check($oldPassword, $user->password)) {
            $res = [
              'status'   =>'error',
              'msg'     =>'Your Old password is incorrect, Please try again with correct details!'
            ];
            return  json_encode($res);
        }
        $userDataToSave = [
        	'name'  => $request->post('name'),
        	'email' => $request->post('email'),
        ];
        if($oldPassword != ''){
            $userDataToSave['password'] = Hash::make($newPassword);
        }
        try {
        	$user->update($userDataToSave);
        	$res = [
              'status'   =>'success',
              'msg'     =>'User data updated successfully!'
            ];
        } catch (\Exception $e) {
        	$res = [
              'status'   =>'error',
              'msg'     =>$e->getMessage()
            ];
        }

        return  json_encode($res);
        
    }
}
