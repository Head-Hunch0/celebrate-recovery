<?php

use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/ticket', [TicketsController::class, 'ticket'])->name('ticket');
Route::get('/register', [TicketsController::class, 'show'])->name('register');
Route::get('/checkout', [TicketsController::class, 'checkout'])->name('checkout');
Route::post('/registeruser', [UserController::class, 'register'])->name('register.user');
Route::get('/login', [UserController::class, 'login'])->name('login');


Route::prefix('/admin')->group(function () {
    // Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/tickets', [TicketsController::class, 'ticketsscan'])->name('admin.tickets');
    Route::post('/tickets/verify', [TicketsController::class, 'verify']);
    Route::post('/purchase', [TicketsController::class, 'payment'])->name('payment');
    Route::get('/', [TicketsController::class, 'index'])->name('admin.index');
    Route::get('/registered-tickets', [TicketsController::class, 'registered'])->name('admin.registered-tickets');
    Route::get('/confirmed-tickets', [TicketsController::class, 'confirmed'])->name('admin.confirmed-tickets');
    Route::get('/sponsoring-tickets', [TicketsController::class, 'sponsoring'])->name('admin.sponsoring-tickets');
    Route::get('/sponsored-tickets', [TicketsController::class, 'sponsored'])->name('admin.sponsored-tickets');

    Route::get('/comms-templates', [CommunicationController::class, 'templates'])->name('admin.comms-templates');
    Route::get('/comms/templates/store', [CommunicationController::class, 'store'])->name('admin.comms.templates.store');
    Route::get('/registered-tickets/{ticket}', [TicketsController::class, 'show'])->name('admin.registered-tickets.show');
    Route::get('/registered-tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('admin.registered-tickets.edit');
    Route::put('/registered-tickets/{ticket}', [TicketsController::class, 'update'])->name('admin.registered-tickets.update');
});
