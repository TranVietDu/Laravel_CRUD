<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function getLogin(){
        return view('auth.login');
    }
    public function getRegister(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=0;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect("/login");
    }
    public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role==0){
                return redirect('/');
            }
            else{
                return redirect('/admin');
            }
        }
        else{
            return back()->withInput(
                $request->only('email')
            )->with("message","Wrong email or password!");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
