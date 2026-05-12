use App\Http\Controllers\RentalController;

Route::get('/rentals/viewing/create', [RentalController::class, 'createViewing']);
Route::post('/rentals/viewing', [RentalController::class, 'storeViewing']);
Route::resource('rentals', RentalController::class);