<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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
//homepage

Route::get('/', [ListingController::class, 'index']);

//Bookmark Controller
//Store a bookmark
Route::post('listings/{listing}/bookmark', [BookmarkController::class, 'store'])->middleware('auth');
// Route::delete('listings/{listing}/bookmark/delete', [BookmarkController::class, 'destroy'])->middleware('auth');
Route::delete('bookmarks/{bookmark}/delete', [BookmarkController::class, 'destroy'])->middleware('auth');
Route::get('/bookmarks', [BookmarkController::class, 'index'])->middleware('auth');

//Applications Controller
Route::get('/applications', [ApplicationController::class, 'index'])->middleware('auth');
Route::post('listings/{listing}/apply', [ApplicationController::class, 'store'])->middleware('auth');

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
//Manage User->Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Update edit submit
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
//Delete Single Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Users
//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Store a user
Route::post('/users', [UserController::class, 'store']);
//Log user out
Route::post('/logout', [UserController::class, 'logout']);
// Show Login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/profile/{profile}/', [ProfileController::class, 'update'])->middleware('auth');

// Route::view('{any?}', 'app')->where(['any' => '.*']);