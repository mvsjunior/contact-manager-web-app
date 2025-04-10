<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Login
|-------------------------------------------------------------------------- */
Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class, 'auth'])->name('login.auth');
Route::middleware('auth')->get('/logout',[AuthController::class, 'logout'])->name('login.logout');


/*
|--------------------------------------------------------------------------
| Contacts
|-------------------------------------------------------------------------- */
Route::get('/', [ContactsController::class,'index'])->name('contacts.index');

// Route::middleware('auth')->prefix('contact')->group(function(){
//     Route::get('/details/{id}', [ContactsController::class,'details'])->name('contact.details');
// });

Route::prefix('contact')->group(function(){
    Route::get('/details/{id}', [ContactsController::class,'details'])->name('contact.details');
    Route::get('/edit/{id}', [ContactsController::class,'formEdit'])->name('contact.edit');
    Route::post('/update', [ContactsController::class,'update'])->name('contact.update');
    Route::get('/remove/{id}', [ContactsController::class,'remove'])->name('contact.remove');
});