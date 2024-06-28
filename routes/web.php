<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/dashboard');
// Auth
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login-page', [AuthController::class, 'index'])->name('login.page');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Pages
Route::get('sales', [TicketController::class, 'sales'])->name('sales');
Route::get('tickets', [TicketController::class, 'tickets'])->name('tickets');


//Admin Controller

Route::group(['middleware' => ['auth', 'authCheck']], function () {
    Route::prefix('admin')->group(function () {

        Route::post('/add-ticket', [AdminController::class, 'createTicket'])->name('admin.create.ticket');
    });
});

//public
Route::get('buy-a-ticket', [PublicController::class, 'index'])->name('index.form');
Route::get('thank-you', [PublicController::class, 'thankYouPage'])->name('index.thank.you.page');
Route::post('purchased-ticket', [PublicController::class, 'purchaseTicket'])->name('purchased.ticket');

Route::post('confirm-ticket', [PublicController::class, 'confirmTicket'])->name('index.confirm.ticket');
Route::get('/preview-notification', function () {
    return view('mail.ticket');
});
