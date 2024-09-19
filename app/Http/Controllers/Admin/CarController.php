<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function carView()
    {
        $cars = Car::all();
        return view("admin.car.index", compact("cars"));
    }

    public function carCreate()
    {
        return view("admin.car.create");
    }

    public function carStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'daily_rent_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        else{
            if($request->has('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $path = 'uploads/car/images';
                $file->move($path, $filename);
                $img_url = "uploads/car/images/" . $filename;
            }
            Car::create([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year'=> $request->year,
                'car_type' => $request->car_type,
                'daily_rent_price' => $request->daily_rent_price,
                'image' => $img_url
            ]);
            return redirect()->route("carView")->with("success", "Car created successfully");
        }
    }

    public function carEdit($id)
    {
        $cars = Car::findOrFail($id);
        return view("admin.car.edit", compact("cars"));
    }

    public function carUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'daily_rent_price' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        else{
            $cars = Car::findOrFail($id);
            if($request->has('image'))
            {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $path = 'uploads/car/images';
                $image->move($path, $filename);
                $img_url = "uploads/car/images/" . $filename;
                File::delete($cars->image);
                $cars->image = $img_url;
            }
            
            $cars->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year'=> $request->year,
                'car_type' => $request->car_type,
                'daily_rent_price' => $request->daily_rent_price,
            ]);
            return redirect()->route("carView")->with("success", "Car updated successfully");
        }
    }


    public function destroy($id)
    {
        $cars = Car::findOrFail($id);
        File::delete($cars->image);
        $cars->delete();
        return redirect()->route("carView")->with("success", "Car deleted successfully");
    }
    

        public function rentalComplete($id)
        {
            $status = Rental::find($id);
            if($status)
            {
                if($status->status)
                {
                    $status->status = 0;
                }
                else
                {
                    $status->status = 1;
                }
            $status->save();
            }
            return back();
        }

        public function rentalCancel($id)
        {
            $status = Rental::find($id);
            if($status)
            {
                if($status->status)
                {
                    $status->status = 0;
                }
                else
                {
                    $status->status = 2;
                }
            $status->save();
            }
            return back();
        }
}
