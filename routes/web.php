<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/admin/index', [AdminController::class, 'indexadmin'])->name('index.admin');

Route::get('/ticket/{id}', [TicketsController::class, 'ticket'])->name('ticket');
Route::get('/register', [TicketsController::class, 'show'])->middleware('throttle:3,1')->name('register');
Route::get('/sponsor', [TicketsController::class, 'sponsor'])->name('sponsor');
Route::get('/thankyou', [TicketsController::class, 'thankyou'])->name('thankyou');
Route::post('/sponsorstore', [TicketsController::class, 'sponsorstore'])->name('sponsorships.store');
Route::get('/checkout', [TicketsController::class, 'checkout'])->name('checkout');
Route::post('/registeruser', [UserController::class, 'register'])->middleware('throttle:3,1')->name('register.user');
Route::post('/registersponsor', [UserController::class, 'registersponsor'])->name('register.sponsor');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/tickets/confirmed/download', [TicketsController::class, 'downloadConfirmedTickets'])->name('tickets.download.confirmed');
Route::get('/tickets/registered/download', [TicketsController::class, 'downloadRegisteredTickets'])->name('tickets.download.registered');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/email', [UserController::class, 'email'])->name('email');
Route::get('/confirm', [TicketsController::class, 'confirm'])->name('confirm');
Route::get('/forgotpassword', [UserController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/passwordemail', [UserController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('password.update');


Route::post('/purchase', [TicketsController::class, 'payment'])->name('payment');
Route::post('/purchase/sponsor', [TicketsController::class, 'paymentsponsor'])->name('payment.sponsor');


Route::middleware('auth')->prefix('/admin')->group(function () {
Route::get('/passconfirm', [UserController::class, 'passconfirm'])->name('passconfirm');
    Route::post('/passupdate', [UserController::class, 'passupdate'])->name('passupdate');
    Route::post('/registered-tickets/search', [TicketsController::class, 'search'])->name('search');
    // Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/tickets', [TicketsController::class, 'ticketsscan'])->name('admin.tickets');
    Route::post('/tickets/verify', [TicketsController::class, 'verify']);
    Route::get('/', [AdminController::class, 'indexadmin'])->name('admin.index');
    Route::get('/registered-tickets', [TicketsController::class, 'registered'])->name('admin.registered-tickets');
    Route::get('/confirmed-tickets', [TicketsController::class, 'confirmed'])->name('admin.confirmed-tickets');
    Route::get('/sponsoring-tickets', [TicketsController::class, 'sponsoring'])->name('admin.sponsoring-tickets');
    Route::get('/sponsored-tickets', [TicketsController::class, 'sponsored'])->name('admin.sponsored-tickets');

    // routes/web.php
    Route::delete('/tickets/{ticket}', [TicketsController::class, 'destroy'])
        ->name('admin.tickets.destroy');

    // payment routes 
    Route::post('/register-pay', [AdminController::class, 'registerPay'])->name('admin.register-pay');


    Route::prefix('/website')->group(function () {
    Route::get('/schedule', [AdminController::class, 'schedule'])->name('admin.website.schedule');
    Route::post('/schedule/add', [AdminController::class, 'scheduleAdd'])->name('admin.website.schedule.add');
    Route::get('/schedule/delete/{id}', [AdminController::class, 'scheduleDelete'])->name('admin.website.schedule.delete');

    Route::get('/speaker', [AdminController::class, 'speaker'])->name('admin.website.speaker');
    Route::post('/speaker/add', [AdminController::class, 'speakerAdd'])->name('admin.website.speaker.add');
    Route::post('/speakers/toggle', [AdminController::class, 'speakerToggle'])->name('admin.website.speaker.toggle');
    Route::get('/speaker/delete/{id}', [AdminController::class, 'speakerDelete'])->name('admin.website.speaker.delete');
    });

    Route::get('/comms-templates', [CommunicationController::class, 'templates'])->name('admin.comms-templates');
    Route::get('/comms/templates/store', [CommunicationController::class, 'store'])->name('admin.comms.templates.store');
    Route::get('/registered-tickets/{ticket}', [TicketsController::class, 'show'])->name('admin.registered-tickets.show');
    Route::get('/registered-tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('admin.registered-tickets.edit');
    Route::put('/registered-tickets/{ticket}', [TicketsController::class, 'update'])->name('admin.registered-tickets.update');
});
