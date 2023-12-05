<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource("/student", StudentController::class);
Route::get('/', function()
{
   return view('students.home');
});
Route::get('/about', function()
{
   return view('students.about');
});
Route::get('/contact', function()
{
   return view('students.contact');
});