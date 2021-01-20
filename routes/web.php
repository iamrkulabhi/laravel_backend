<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('user')->group(function(){
        Route::get('/show', [UserController::class, 'show'])->name('admin.user.show');

        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/add', [UserController::class, 'on_add'])->name('admin.user.add');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'on_edit'])->name('admin.user.edit');


    });

    Route::get('/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/profile/change-password', [ProfileController::class, 'change_password'])->name('admin.profile.change-password');
    Route::post('/profile/change-password', [ProfileController::class, 'on_change_password'])->name('admin.profile.change-password');
});

require __DIR__.'/auth.php';
