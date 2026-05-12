<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PropertyController;


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $totalProperties = \App\Models\PropertyForRent::count();
        $totalStaff = \App\Models\Staff::count();
        $totalRenters = \App\Models\Renter::count();
        $activeLeases = \App\Models\Lease::where('status', 'Active')->count();
        $recentProperties = \App\Models\PropertyForRent::orderBy('propertyNo')->take(5)->get();

        return view('dashboard', compact(   // ← this line was missing
            'totalProperties',
            'totalStaff',
            'totalRenters',
            'activeLeases',
            'recentProperties'
        ));
    })->name('dashboard');

    Route::resource('clients', ClientController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('properties', PropertyController::class);
});

require __DIR__.'/auth.php';