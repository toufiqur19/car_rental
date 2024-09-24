<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function carDetails($id)
    {
        $carsDetails = Car::find($id);

        return view("frontend.car-details",compact("carsDetails"));
    }

    public function carsBook(Request $request,$id)
    {
        $carsDetails = Car::find($id);
        // return $carsDetails;
        $car_id = Car::find($id);
        $email = $request->user()->email;
        $user_id = $request->user()->id;
        $adminEmail = User::where("role","admin")->pluck("email")->first();

       // calculate total cust per day
       $daily_cost = $car_id->daily_rent_price;
       $start_date = Carbon::parse($request->start_date);
       $end_date = Carbon::parse($request->end_date);
       $total_days = $start_date->diffInDays($end_date);
       $total_cost = $daily_cost * $total_days;

        $isBooked = Rental::where("car_id","=",$car_id->id)
        ->where("start_date","<=",$start_date)
        ->where("end_date",">=",$end_date)->exists();

        $existStartDate = Rental::where("car_id","=",$car_id->id)->pluck("start_date")->first();
        $existEndDate = Rental::where("car_id","=",$car_id->id)->pluck("end_date")->first();
        
        if($isBooked){
            return redirect()->back()->with("data","$existStartDate To $existEndDate already booked");
        }
        else
        {
            $rental = new Rental();
            $rental->car_id = $car_id->id;
            $rental->user_id = $user_id;
            $rental->start_date = $start_date;
            $rental->end_date = $end_date;
            $rental->total_cost = $total_cost;
            $rental->save();
        }
        
        $response = Mail::to($email)->send(new SendMail($carsDetails));
        $response = Mail::to($adminEmail)->send(new AdminMail($user_id, $carsDetails));

        if($response)
        {
            return redirect("/car-rentals")->with("success","Car booked successfully");
        }
       
       return redirect("/car-rentals")->with("success","Car booked successfully");
    }

}
