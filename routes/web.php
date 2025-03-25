<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManagedStaffController;
use App\Http\Controllers\AdminManageUserController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffTicketController;
use App\Http\Controllers\SupportStaffController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserDashBoardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/',IndexController::class);
// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::resource('Ticket',TicketController::class);

    Route::resource('attachment',AttachmentController::class);

    Route::resource('comment',CommentController::class);
    Route::resource('file', FileController::class);


});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route:: get('/user',[UserDashBoardController::class,'index']);
    Route:: resource('user',UserDashBoardController::class);
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::resource('admin',AdminController::class);
    Route:: get('/admin',[AdminController::class,'index']);
    Route::resource('AdminTicket',AdminTicketController::class);
    // Route:: get('admin',[AdminController::class,'staff'])->name('admin.staff');
    Route:: resource('adminManagedStaff',AdminManagedStaffController::class);
    Route::resource('adminManagedUser',AdminManageUserController::class);
});

Route::middleware(['auth', 'role:support_staff'])->group(function () {
   Route:: resource('support_staff',SupportStaffController::class);
   Route:: resource('staffTicket',StaffTicketController::class);
//    Route::put('staffTicket/tickets/{ticket}', [StaffTicketController::class, 'update'])->name('staff.tickets.update');


});

require __DIR__.'/auth.php';
