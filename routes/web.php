<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function(){ return view('welcome'); })->name('home');

Route::get('/send-test-mail', function () {
    Mail::raw('This is a test email from Laravel using Gmail SMTP.', function ($message) {
        $message->to('pn3909266@gmail.com')
                ->subject('Test Email');
    });

    return 'Email sent successfully!';
});

/*
| Registration
*/
Route::get('/register/customer', [CustomerRegisterController::class, 'showForm'])->name('customer.register.form');
Route::post('/register/customer', [CustomerRegisterController::class, 'register'])->name('customer.register');

Route::get('/register/admin', [AdminRegisterController::class, 'showForm'])->name('admin.register.form');
Route::post('/register/admin', [AdminRegisterController::class, 'register'])->name('admin.register');

/*
| Verification
*/
Route::get('/verify', [VerificationController::class, 'showForm'])->name('verify.form');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verify.submit');

/*
| Admin login
*/
Route::get('/admin/login', [AdminLoginController::class, 'showForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

/*
| Protected admin area
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});