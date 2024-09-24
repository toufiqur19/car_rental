<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RentalController extends Controller
{
    public function rentalView()
    {
        $rentals = Rental::with("car")->with("user")->get();
        return view("admin.rentals.index",compact("rentals"));
    }

    public function rentalEdit($id)
    {
        $rentals = Rental::with("car")->with("user")->find($id);
        $cars = Car::all();
        // return $car;
        return view("admin.rentals.edit",compact("rentals","cars"));
    }

    public function rentalCreate()
    {
        return view("admin.rentals.create");
    }
    public function rentalStore(Request $request)
    {
        $car = $request->car_id;
        $car_id = Car::find($car);
        $daily_rent = Car::where("id","=",$car)->pluck("daily_rent_price")->first();
        $user = $request->email;
        $user_id = User::where("email","=",$user)->pluck("id")->first();
        
       // calculate total cust per day
       $daily_cost = $daily_rent;
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

        return redirect('/rental')->with("success","Rental Added Successfully!");
    }
    
    public function rentalUpdate(Request $request,$id)
    {
        $rentals_id = Rental::find($id);
        $validator = Validator::make($request->all(),[
            'car_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $rentals_id->update([
                'car_id' => $request->car_id,
                'status'=> $request->status,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
            return redirect('/rental')->with("success","Rental Update Successfully!");
        }
    }


    public function destroy($id)
    {
        $rentals_id = Rental::find($id);
        $rentals_id->delete();
        return redirect('/rental')->with("success","Rental Deleted Successfully!");
    }
}
