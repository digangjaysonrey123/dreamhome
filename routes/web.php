<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalController;

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

        return view('dashboard', compact(
            'totalProperties',
            'totalStaff',
            'totalRenters',
            'activeLeases',
            'recentProperties'
        ));
    })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware('role:admin,manager,supervisor,assistant')->group(function () {
        Route::resource('clients', ClientController::class);
    });

    Route::middleware('role:admin,manager,supervisor,assistant')->group(function () {
        Route::resource('properties', PropertyController::class);
    });

    Route::middleware('role:admin,manager,supervisor')->group(function () {
        Route::resource('staff', StaffController::class);
        Route::resource('branch', BranchController::class);
    });

    Route::middleware('role:admin,manager,cashier')->group(function () {
        Route::resource('payments', PaymentController::class);
    });

    Route::middleware('role:admin,manager,supervisor,assistant')->group(function () {
        Route::get('/rentals/viewing/create', [RentalController::class, 'createViewing']);
        Route::post('/rentals/viewing', [RentalController::class, 'storeViewing']);
        Route::resource('rentals', RentalController::class);
    });
});

require __DIR__.'/auth.php';
