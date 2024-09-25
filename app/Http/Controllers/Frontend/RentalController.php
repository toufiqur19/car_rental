<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;

class RentalController extends Controller
{
    public function Rentals(Request $request, Car $car)
    {
        $rentals = Car::all();
        $car_brand = $request->input('brand');
        $car_type = $request->input('car_type');
        $search = $request->input("search");
        if($search) {
            $rentals = Car::where('daily_rent_price', 'like', "%$search%")->get();
        } 
        elseif ($car_brand) {
            $rentals = Car::where('brand','like',"%$car_brand%")->get();
        }
        elseif ($car_type) {
            $rentals = Car::where('car_type', $car_type)->get();
        }
        return view("frontend.rentals",compact("rentals"));
    }

    public function rentalView(Request $request)
    {
        $user_id = $request->user()->id;
        $carRentals = Rental::where("user_id","=",$user_id)
                ->with("car")->with("user")->get();
        return view("frontend.rentals-view",compact("carRentals"));
    }
}
