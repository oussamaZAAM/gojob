<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class, 'index']);

// Route::get('/listing/{id}', function ($id) {
//     $listing = Listing::find($id);
//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort("404");
//     }
// });

//Show Form to Create a Listing
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');

//Store a new Listing
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

//Show Form to Edit a Listing
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update a Listing
Route::put('/listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete a Listing
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');

//Show a Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);


//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create a new User
Route::post('/users', [UserController::class, 'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);