<?php

use Illuminate\Support\Facades\Route;

// Main Pages
Route::view('/', 'login')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Fleet and Vehicle Management (FVM)
Route::prefix('fvm')->name('fvm.')->group(function () {
    Route::view('/vehicles', 'fvm.vehicles')->name('vehicles');
    Route::view('/maintenance', 'fvm.maintenance')->name('maintenance');
    Route::view('/assignment-tracking', 'fvm.assignment-tracking')->name('assignment-tracking');
    Route::view('/request-new-vehicle', 'fvm.request-new-vehicle')->name('request-new-vehicle');
});

// Vehicle Reservation and Dispatch System (VRDS)
Route::prefix('vrds')->name('vrds.')->group(function () {
    Route::view('/reservation', 'vrds.reservation')->name('reservation');
    Route::view('/dispatch-scheduling', 'vrds.dispatch-scheduling')->name('dispatch-scheduling');
});

// Driver and Trip Performance Monitoring (DTPM)
Route::prefix('dtpm')->name('dtpm.')->group(function () {
    Route::view('/driver-profiles', 'dtpm.driver-profiles')->name('driver-profiles');
    Route::view('/trip-reports', 'dtpm.trip-reports')->name('trip-reports');
    Route::view('/performance', 'dtpm.performance')->name('performance');
});

// Transport Cost Analysis and Optimization (TCAO)
Route::prefix('tcao')->name('tcao.')->group(function () {
    Route::view('/fuel-and-trip-cost', 'tcao.fuel-and-trip-cost')->name('fuel-and-trip-cost');
    Route::view('/utilization', 'tcao.utilization')->name('utilization');
    Route::view('/optimization', 'tcao.optimization')->name('optimization');
});
