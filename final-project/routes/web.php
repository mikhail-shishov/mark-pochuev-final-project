<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [FrontController::class, "index"])->name("home");
Route::get("/about", [FrontController::class, "about"])->name("about");
Route::get("/contact", [FrontController::class, "contact"])->name("contact");
Route::post("/contact", [FrontController::class, "contactSubmit"])->name("contact.submit");
Route::get("/posts/{post}", [FrontController::class, "show"])->name("posts.show");