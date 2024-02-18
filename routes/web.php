<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('employee.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/employee', function () {
    return view('/employee/index');
})->middleware(['auth', 'verified'])->name('employee.index');

Route::get('/employee/create', function () {
    return view('/employee/create');
})->middleware(['auth', 'verified'])->name('employee.create');

Route::get('/employee/directory', function () {
    return view('/employee/directory');
})->middleware(['auth', 'verified'])->name('employee.directory');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('logout');

Route::get('/employee', [EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class,'store'])->name('employee.store');
Route::get('/employee/{slug}', [EmployeeController::class,'show'])->name('employee.show');
Route::get('/employee/{slug}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/employee/{slug}', [EmployeeController::class,'update'])->name('employee.update');
Route::delete('/employee/{slug}/delete', [EmployeeController::class,'delete'])->name('employee.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
