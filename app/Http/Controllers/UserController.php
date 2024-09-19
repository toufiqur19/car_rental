<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
     // customer registration
   public function registration(Request $request)
   {
       $validate = Validator::make($request->all(), [
           "name"=> "required",
           "phone"=> "required",
           "address"=> "required",
           "email"=> "required|email|unique:users",
           "password"=> "required|min:6|confirmed",
           "password_confirmation"=> "required|min:6"
       ]);
       if ($validate->fails())
       {
           return redirect()->back()->withErrors($validate)->withInput();
       }else{
           User::create([
               "name"=> $request->name,
               "email"=> $request->email,
               "phone"=> $request->phone,
               "address"=> $request->address,
               "password"=> Hash::make($request->password),
           ]);
       }
       return redirect('/login')->with("success","Customer Registration Successfully!");
   }

   // customer login
   public function loginUser(Request $request)
   {
       $validate = Validator::make($request->all(), [
           "email"=> "required|email",
           "password"=> "required|min:6"
       ]);
       if ($validate->fails())
       {
           return redirect()->back()->withErrors($validate)->withInput();
       }else{
           $credentials = $request->only('email', 'password');
           if (auth()->attempt($credentials)) {
               if(auth()->user()->role == 'admin'){
                   return redirect('/dashboard')->with('success','Login Successfully');
               }else{
                   return redirect("/")->with('success','Login Successfully');
               }
           }
           return redirect()->back()->with('error','Email or Password Invalid');
       }
   }

   // customer logout
   public function logout()
   {
       Session::flush();
       Auth::logout();
       return redirect('/')->with('success','Logout Successfully');
   }
}
