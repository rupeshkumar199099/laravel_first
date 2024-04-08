<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () { return view('header'); });
Route::get('/contact', function () { return view('contact'); });
Route::post('/contact', [UserController::class,'contactForm']);
Route::get('/myInfo', [UserController::class,'showContact'])->name('contactUs');
// Route::post('/myInfo/{search?}', [UserController::class,'showContact'])->name('contactUs');
Route::get('/edit/{id}', [UserController::class,'editDetails']);
// Route::get('/edit/{id}', function(string $id=null){
//     if($id) 
//         return "ID Matched";
//     else 
//         return "not Matched"; 
// })->whereIn('id',['city',5]);
Route::post('/edit', [UserController::class,'update']);
Route::get('/delete/{id}', [UserController::class,'delete']);
Route::get('/delete/{id}', [UserController::class,'deleteContact'])->name('deleteContact');
Route::get('/add-img', function() {return view('add-image'); } );
Route::post('/add-img', [UserController::class,'addImage'])->name('addImage');
Route::get('/gallery/{id?}', [UserController::class,'showImage'])->name('show-image');

Route:: fallback(function(){
    return view('404');
});
