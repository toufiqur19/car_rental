<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    
    public function Rentals(Request $request)
    {
        if(auth()->user()){
            $user_id = $request->user()->id;
            $carRentals = Rental::where("user_id","=",$user_id)
                ->with("car")->with("user")->get();
            return view("frontend.rentals",compact("carRentals"));
        }
        else{
            return redirect("login")->with("error","login to see your rentals");
        }
    }
}
