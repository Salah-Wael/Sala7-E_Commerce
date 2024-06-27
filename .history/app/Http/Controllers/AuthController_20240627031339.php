<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Http\Controllers\ImageController;

class AuthController extends Controller
{

    public function showRegister(){
        return view('/auth.register');
    }

    public function register(UserAuthRequest $request){
        $user=new User;
        $user['name']= $request['name'];
        $user['email']= $request['email'];
        $user['password']=bcrypt($request['password']);
        $user['birthDate']= $request['birthDate'];
        $user['gender']= $request['gender'];
        $user['role'] = 'user';
        $user->save();

        return redirect()->route('login')->with("success","Registration Successfully");
    }
    
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request) {
        $validatedData = $request->validate([
        'email' => ['required','email'],
        'password' => ['required']
        ],
        #errors
        [
                'email' . 'email' => "Invalid Login Details!",
                'email' . 'required' => "Invalid Login Details!",
                'password' . 'required' => "Invalid Login Details!"
        ]);

        
        if(auth()->attempt($validatedData, $request->get('remember'))) {

            #logged in
            session()->regenerate();
            $userRole = auth()->user()->role;
            switch($userRole){
                case auth()->user()->role == 'admin':
                    return redirect('/')
                    ->with('successRole', 'You have successfully logged in as admin');
                    break;

                case auth()->user()->role == 'user':
                    return  redirect('/');
                    break;

                default:
                    return back()->withErrors(
                    ['email' => 'Invalid Login Details!',
                    'password' => 'Invalid Login Details!'
                    ]);
            }

        }
        else{
            return back()->withErrors(
                [
                    'email' => 'Invalid Login Details!',
                    'password' => 'Invalid Login Details!'
                ]
            );
        }
    }
    // public function showForgotPassword() {
    //     return view('auth.forgot-password');
    // }

    // public function forgotPassword(){

    // }

    public function  logout() {
        auth()->logout();
        session()->regenerateToken();
        session()->invalidate();
        return  redirect()->route('login')->with("success","Logged out successfully!");
    }
}
