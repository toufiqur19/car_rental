<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Home page routes
Route::get("/",[PageController::class,"index"])->name("home")->name('home');
Route::get("/car-details/{id}",[FrontendCarController::class,"carDetails"])->name("carDetails");
Route::post("/carsBook/{id}",[FrontendCarController::class,"carsBook"])->name("carsBook");
Route::get("/car-rentals",[RentalController::class,"Rentals"])->name("carsRentals");
Route::get("/status/{id}",[CarController::class,"rentalComplete"])->name("rentalComplete");
Route::get("/status/cancel/{id}",[CarController::class,"rentalCancel"])->name("rentalCancel");

Route::get('/contact',[PageController::class,"contact"])->name("contact");

// login routes
Route::get("/login",[PageController::class,"login"])->name("login");
Route::get("/register",[PageController::class,"register"])->name("register");
Route::post('/register',[UserController::class,"registration"])->name("registerUser");
Route::post('/loginUser',[UserController::class,"loginUser"])->name("loginUser");
Route::get('/logout',[UserController::class,"logout"])->name("logout");

// admin panel routes
Route::middleware(["admin","auth"])->group(function () {
    Route::get("/dashboard",[PageController::class,"dashboard"])->name("dashboard");
    Route::get("/car",[CarController::class,"carView"])->name("carView");
    Route::get("/car/create",[CarController::class,"carCreate"])->name("car.create");
    Route::post("/car/store",[CarController::class,"carStore"])->name("carStore");
    Route::get("/car/edit/{id}",[CarController::class,"carEdit"])->name("carEdit");
    Route::put("/car/update/{id}",[CarController::class,"carUpdate"])->name("carUpdate");
    Route::get("/car/delete/{id}",[CarController::class,"destroy"])->name("carDelete");

    // rentals routes
    Route::get("/rental",[AdminRentalController::class,"rentalView"])->name("rentalView");
    Route::get("/rental/create",[AdminRentalController::class,"rentalCreate"])->name("rental.create");
    Route::post("/rental/store",[AdminRentalController::class,"rentalStore"])->name("rentalStore");
    Route::get("/rental/edit/{id}",[AdminRentalController::class,"rentalEdit"])->name("rentalEdit");
    Route::put("/rental/update/{id}",[AdminRentalController::class,"rentalUpdate"])->name("rentalUpdate");
    Route::get("/rental/delete/{id}",[AdminRentalController::class,"destroy"])->name("rentalDelete");

    // customer routes
    Route::get("/customer",[CustomerController::class,"customerView"])->name("customerView");
    Route::get("/customer/create",[CustomerController::class,"customerCreate"])->name("customer.create");
    Route::post("/customer/store",[CustomerController::class,"customerStore"])->name("customerStore");
    Route::get("/customer/edit/{id}",[CustomerController::class,"customerEdit"])->name("customerEdit");
    Route::get("/customer/view/{id}",[CustomerController::class,"customerAllView"])->name("customerview");
    Route::put("/customer/update/{id}",[CustomerController::class,"customerUpdate"])->name("customerUpdate");
    Route::get("/customer/delete/{id}",[CustomerController::class,"customerDelete"])->name("customerDelete");

});


