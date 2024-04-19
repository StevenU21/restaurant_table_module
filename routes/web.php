<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/tables', TableController::class);
    
    Route::get('/assignments/client-list', [AssignmentController::class, 'clientList'])->name('assignments.client-list');
    Route::resource('/assignments', AssignmentController::class);
    
    Route::resource('/invoices', InvoiceController::class)->only(['index']);
    Route::get('/invoices/download/{id}', [InvoiceController::class, 'download'])->name('invoices.download');

    Route::get('/auditories', [AuditController::class, 'index'])->name('auditories.index');

    Route::resource('/types', TypeController::class)->except('index', 'show');
    Route::prefix('types')->group(function () {
        Route::get('/', [TypeController::class, 'index'])->name('types.index');
        Route::get('/show/{type}', [TypeController::class, 'show'])->name('types.show');
        Route::get('/search', [TypeController::class, 'search'])->name('types.search');
        Route::get('/autocomplete', [TypeController::class, 'autocomplete'])->name('types.autocomplete');
    });

    Route::resource('/clients', ClientController::class);
});

require __DIR__ . '/auth.php';
