<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{
    public function index(Request $request){
        if($request->method() == 'GET'){
            // dd(1, 'Verification');
            return view('verification.index');
        }
        else if($request->method() == 'POST'){
            // dd(2, $request->all());
            $credentials = [
                'email' => $request->input('email'),
                'password' => encrypt($request->input('password')),
            ];

            $user = Userinfo::where('email', $credentials['email'])->first();
           
            if ($user) {
                if ($user->role == 'user') {
                    if ($request->input('password') == decrypt($user->password)) {
                        session(['role' => 'user', 'id' => $user->id]);
                        return response()->json([
                            'title' => 'Success',
                            'text' => 'Logged in successfully',
                            'icon' => 'success',
                            'url' => 'user/index'
                        ]);
                    } else {
                        return response()->json([
                            'title' => 'Error',
                            'text' => 'Incorrect password',
                            'icon' => 'error',
                        ]);
                    }
                } else if ($user->role == 'admin') {
                    
                    if ($request->input('password') == decrypt($user->password)) {
                        session(['role' => 'admin', 'id' => $user->id]);
                        return response()->json([
                            'title' => 'Success',
                            'text' => 'Logged in successfully',
                            'icon' => 'success',
                            'url' => 'admin/index'
                        ]);
                    } else {
                        return response()->json([
                            'title' => 'Error',
                            'text' => 'Incorrect password',
                            'icon' => 'error',
                        ]);
                    }
                }
            }
            
            else{
                return response()->json([
                    'title' => 'Error',
                    'text' => 'Invalid credentials',
                    'icon' => 'error',
                ]);
            }
        }    
    }

    public function signup(Request $request){
       
        if ($request->method() == 'GET'){
           
            return view('verification.signup');
        }
        else if($request->method() == 'POST'){
            $user = new Userinfo();
            $user->name = request('full_name');
            $user->email = request('email');
            $user->password = encrypt(request('password'));
            $user->address = request('address');
            $user->nid = request('nid');
            $user->is_delete = 1;
            $user->role = 'user';
            if($user->save()){
                return response()->json([
                    'title' => 'Success',
                    'text' => 'Operation completed successfully',
                    'icon' => 'success',
                ]);
            }
            else{
                return response()->json([
                    'title' => 'Error Occured',
                    'text' => 'Something went wrong',
                    'icon' => 'error',
                ]);
            }
        }
    }    
}
