<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('rooms', [App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
    Route::get('rooms/create', [App\Http\Controllers\RoomController::class, 'create'])->name('rooms.create');
    Route::post('rooms', [App\Http\Controllers\RoomController::class, 'store'])->name('rooms.store');
    Route::delete('rooms/{room}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::get('rooms/check', [App\Http\Controllers\RoomController::class, 'check'])->name('rooms.check');

    Route::get('reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/create', [App\Http\Controllers\ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('reservations/check', [App\Http\Controllers\ReservationController::class, 'check'])->name('reservations.check');
});


