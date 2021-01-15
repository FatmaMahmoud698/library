<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function register(){
    	return view('Auth.register');
    }
    public function doRegister(Request $request){
    	$request->validate([
    		'name'=>'required|string|max:100',
    		'email'=>'required|email|max:100',
    		'password'=>'required|string|min:6'
    	]);
    	User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>Hash::make($request->password),
    		'api_token'=>Str::random(64)
    	]);
    	return redirect(route('allBooks'));
    }
    public function login(){
    	return view('Auth.login');
    }
    public function doLogin(Request $request){
    	$request->validate([
    		'email'=>'required|email|max:100',
    		'password'=>'required|string|min:6'	
    	]);

    	if(! Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		return redirect(route('authLogin'));
    	}else{
    		return redirect(route('allBooks'));
    	}
    }
    public function logout(){
    	Auth::logout();
    	return redirect(route('authLogin'));
    }
}
