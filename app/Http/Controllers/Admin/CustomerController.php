<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    // customer view
    public function customerView(Request $request)
    {
        $customers = User::with("rentals")->get();
        return view("admin.customer.customer",compact("customers"));
    }

    // customer create

    public function customerCreate(Request $request)
    {
        return view("admin.customer.create");
    }

    // customer store
   public function customerStore(Request $request)
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
        return redirect('/customer')->with("success","Customer Create Successfully!");
    }

    // customer edit
    public function customerEdit($id)
    {
        $customers = User::find($id);
        return view("admin.customer.edit",compact("customers"));
    }

    // customer update
    public function customerUpdate(Request $request, $id)
    {
        $customers = User::find($id);

        $validate = Validator::make($request->all(), [
            "name"=> "required",
            "phone"=> "required",
            "address"=> "required",
            "email"=> "required"
        ]);

        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }else{
            $customers->update([
                "name"=> $request->name,
                "email"=> $request->email,
                "phone"=> $request->phone,
                "address"=> $request->address,
            ]);
            return redirect('/customer')->with("success","Customer Update Successfully!");
        }
    }

    // customer view details
    public function customerAllView($id)
    {
        $customersDetails = User::with("rentals")->find($id);
        return view("admin.customer.view",compact("customersDetails"));
    }


    /// customer delete
    public function customerDelete($id)
    {
        $customers = User::find($id);
        $customers->delete();
        return redirect('/customer')->with("success","Customer Delete Successfully!");
    }
}
