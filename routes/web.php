<?php

use App\Http\Controllers\ListingController;
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
Route::get('/listing/create', [ListingController::class, 'create']);

//Store a new Listing
Route::post('/listing', [ListingController::class, 'store']);

//Show Form to Edit a Listing
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit']);

//Update a Listing
Route::put('/listing/{listing}', [ListingController::class, 'update']);

//Show a Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);
