<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Services\MpesaService;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::get('/ticket/{id}', [TicketsController::class, 'ticket'])->name('ticket');
Route::get('/register', [TicketsController::class, 'show'])->name('register');
Route::get('/sponsor', [TicketsController::class, 'sponsor'])->name('sponsor');
Route::get('/thankyou', [TicketsController::class, 'thankyou'])->name('thankyou');
Route::post('/sponsorstore', [TicketsController::class, 'sponsorstore'])->name('sponsorships.store');
Route::get('/checkout', [TicketsController::class, 'checkout'])->name('checkout');
Route::post('/registeruser', [UserController::class, 'register'])->name('register.user');
Route::post('/registersponsor', [UserController::class, 'registersponsor'])->name('register.sponsor');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/email', [UserController::class, 'email'])->name('email');


Route::get('/test-mpesa', function (MpesaService $service) {
    dd(method_exists($service, 'initiateSTKPush'));
});

Route::prefix('payment')->group(function () {
    // Show payment form
    Route::get('/payment', [MpesaController::class, 'showPaymentForm'])->name('mpesa.payment');

    // Initiate STK Push
    Route::post('/initiate', [MpesaController::class, 'initiatePayment'])->name('mpesa.initiate');

    // Check payment status
    Route::get('/status', [MpesaController::class, 'checkStatus'])->name('mpesa.status');

    // Callback URL (must remain POST)
    Route::post('/callback', [MpesaController::class, 'handleCallback']);
});

Route::post('/purchase', [TicketsController::class, 'payment'])->name('payment');
Route::post('/purchase/sponsor', [TicketsController::class, 'paymentsponsor'])->name('payment.sponsor');

Route::middleware('auth')->prefix('/admin')->group(function () {
Route::get('/passconfirm', [UserController::class, 'passconfirm'])->name('passconfirm');
    Route::post('/passupdate', [UserController::class, 'passupdate'])->name('passupdate');
    Route::post('/registered-tickets/search', [TicketsController::class, 'search'])->name('search');
    // Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/tickets', [TicketsController::class, 'ticketsscan'])->name('admin.tickets');
    Route::post('/tickets/verify', [TicketsController::class, 'verify']);
    Route::get('/', [TicketsController::class, 'index'])->name('admin.index');
    Route::get('/registered-tickets', [TicketsController::class, 'registered'])->name('admin.registered-tickets');
    Route::get('/confirmed-tickets', [TicketsController::class, 'confirmed'])->name('admin.confirmed-tickets');
    Route::get('/sponsoring-tickets', [TicketsController::class, 'sponsoring'])->name('admin.sponsoring-tickets');
    Route::get('/sponsored-tickets', [TicketsController::class, 'sponsored'])->name('admin.sponsored-tickets');

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
