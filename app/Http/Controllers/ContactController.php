<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact()
    {
        return view("frontend.contact-form");
    }

    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=> "required",
            "email"=> "required|email",
            "phone" => "required",
            "message"=> "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            Contact::create([
                "name"=> $request->name,
                "email"=> $request->email,
                "phone"=> $request->phone,
                "message"=> $request->message,
            ]);
        }
        return redirect('/contact')->with("success","Message Send Successfully!");
    }

    public function viewContract()
    {
        $contacts = Contact::all();
        return view("admin.contact",compact("contacts"));
    }

    public function contactDelete($id)
    {
        Contact::find($id)->delete();
        return redirect()->back();
    }
}
