<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KycKybController;
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
    return redirect('login');
});

Route::get('/redirect-after-login', function () {
    if (auth()->check()) {
        return match (auth()->user()->user_role) {
            'admin' => redirect('/admin/kyc'),
            'user'  => redirect('/onboarding'),
            default => abort(403),
        };
    }

    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/onboarding', [KycKybController::class, 'create'])->name('kyc-kyb.form');
//     Route::post('/onboarding', [KycKybController::class, 'store'])->name('kyc-kyb.store');
// });

Route::middleware(['auth', 'is_user'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/onboarding', [KycKybController::class, 'create'])->name('kyc-kyb.form');
    Route::post('/onboarding', [KycKybController::class, 'store'])->name('kyc-kyb.store');

    Route::get('/application-status', [KycKybController::class, 'status'])->name('kyc-kyb.status');
});

require __DIR__.'/auth.php';
