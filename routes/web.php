<?php

use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\RoomsController;
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
    return view('welcome');
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

Route::resource('appartment', AppartmentController::class)->middleware('auth');
Route::resource('room', RoomsController::class)->middleware('auth');

// Route::controller(AppartmentController::class)->group(  function () {
   

// })->middleware('auth');

require __DIR__.'/auth.php';
