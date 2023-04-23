<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::resource('categories', CategoryController::class)->middleware(['auth', 'is_admin']);

Route::resource('subjects', SubjectController::class);
Route::get('/subjects/{id}/category', [SubjectController::class, 'subjectsByCategory']);
Route::resource('/commands', CommandController::class);

Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/auth.php';
