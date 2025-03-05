<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/',IndexController::class);
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('Ticket',TicketController::class);

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin',AdminController::class);
    Route::resource('AdminTicket',AdminTicketController::class);
});

Route::middleware(['auth', 'role:support_staff'])->group(function () {
   
});

require __DIR__.'/auth.php';
