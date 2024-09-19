<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function rentalView()
    {
        $rentals = Rental::with("car")->with("user")->get();
        return view("admin.rentals.index",compact("rentals"));
    }

    public function rentalEdit($id)
    {
        $rental = Rental::find($id)->with("car")->with("user")->get();
        return $rental;
        return view("admin.rentals.edit",compact("rental"));
    }
    
    public function rentalUpdate()
    {

    }
}
