<?php

use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\bioDataController;
use App\Http\Controllers\CashPaymentController;
use App\Http\Controllers\LandLordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\FlatsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentDetailsController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $pageData = [
        'title' => 'Dashboard'
    ];
    return view('dashboard', $pageData);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(RoleController::class)->group( function () {
    Route::get('/roles/index/', 'index')->name('roles.index');
    Route::get('/roles/{id}/edit/', 'edit')->name('roles.edit');
    Route::get('/roles/{id}/show/', 'show')->name('roles.show');
    Route::put('/roles/{id}/update/', 'update')->name('roles.update');
})->middleware('auth');



Route::resource('user', UserController::class)->middleware('auth');
Route::resource('cash', CashPaymentController::class)->middleware('auth');

Route::resource('bioData', bioDataController::class)->middleware('auth');




Route::get('/initate/stk/push/', [PaymentController::class, 'initiateStkPush'])->name('initiate.push');
Route::get('stk/callback/', [PaymentController::class, 'stkCallback'])->name('stk.callback');
Route::get('validation/', [PaymentController::class, 'Validation'])->name('validation');
Route::get('transaction/confirmation/', [PaymentController::class, 'Confirmation'])->name('confirmation');
Route::get('allmpesa/c2b/transactions/', [PaymentController::class, 'allMpesaC2BTransactions'])->name('allMpesaTransactions');

Route::post('/payments/{payment}/allocate', [PaymentController::class, 'allocatePaymentToTenant'])->name('allocatePaymentToTenant');

// Route::post('/stkcallback','stkCallback')->name('stkcallback');
// Route::get('/stkquery','stkQuery')->name('stkquery');
// Route::get('/registerurl','registerUrl')->name('registerurl');
// Route::post('/validation','Validation')->name('validation');
// Route::post('/confirmation','Confirmation')->name('confirmation');
// Route::get('/simulate','Simulate')->name('simulate');
// Route::get('/qrcode','qrcode')->name('qrcode');
// Route::get('/b2c','b2c')->name('b2c');
// Route::post('/b2cresult','b2cResult')->name('b2cresult');
// Route::post('/b2ctimeout','b2cTimeout')->name('b2ctimeout');
// Route::get('/reversal','Reversal')->name('reversal');
// Route::post('/reversalresult','reversalResult')->name('reversalresult');
// Route::post('/reversaltimeout','reversalTimeout')->name('reversaltimeout');

require __DIR__.'/auth.php';
