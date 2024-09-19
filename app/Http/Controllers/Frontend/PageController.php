<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request, Car $car)
    {
        $cars = Car::all();
        // $uniqueb = $cars->unique('brand');
        // $uniquet = $cars->unique('car_type');
        $car_brand = $request->input('brand');
        $car_type = $request->input('car_type');
        $search = $request->input("search");
        if($search) {
            $cars = Car::where('daily_rent_price', 'like', "%$search%")->get();
        } 
        elseif ($car_brand) {
            $cars = Car::where('brand','like',"%$car_brand%")->get();
        }
        elseif ($car_type) {
            $cars = Car::where('car_type', $car_type)->get();
        }
        
        return view("frontend.home", compact("cars"));
    }

    public function dashboard()
    {
        $numberCars = Car::count();
        $availableCars = Car::where("availability",1)->count();
        $totalRentals = Rental::count();
        $totalEarning = Rental::sum("total_cost");
        return view("admin.dashboard",compact("numberCars","availableCars","totalRentals","totalEarning"));
    }

    public function login()
    {
        return view("frontend.auth.login");
    }

    public function register()
    {
        return view("frontend.auth.register");
    }

    public function contact()
    {
        return view("frontend.contact-form");
    }
}
