<?php

use Illuminate\Support\Facades\Route;

// Main Pages
Route::view('/', 'login')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Fleet and Vehicle Management (FVM)
Route::view('/fleet-and-vehicle-management', 'fvm')->name('fleet.index');

// Vehicle Reservation & Dispatch System (VRDS)
Route::view('/vehicle-reservation-and-dispatch-system', 'vrds')->name('vrds.index');

// Driver and Trip Performance Monitoring (DTPM)
Route::view('/driver-and-trip-performance-monitoring', 'dtpm')->name('dtpm.index');

// Transport Cost Analysis & Optimization (TCAO)
Route::view('/transport-cost-and-analysis-optimization', 'tcao')->name('tcao.index');