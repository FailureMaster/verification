<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\FileController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your Admin!
|
*/

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/kyc', [KycController::class, 'index'])->name('admin.kyc.index');
        Route::get('/kyc/{id}', [KycController::class, 'show'])->name('admin.kyc.show');
        Route::post('/kyc/{id}/verify', [KycController::class, 'verify'])->name('admin.kyc.verify');
    });

    Route::get('/admin/files/{filename}', [FileController::class, 'viewEncrypted'])
        ->name('admin.files.view')
        ->middleware('auth', 'is_admin');

    Route::get('/admin/files/view/{filename}', [FileController::class, 'viewInline'])
    ->name('admin.files.view.inline')
    ->middleware('auth', 'is_admin');
});
