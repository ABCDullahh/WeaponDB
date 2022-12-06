<?php

use App\Http\Controllers\weaponController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\dataweapController;
use App\Http\Controllers\pabrikController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::redirect('/', '/login');



Route::get('/', function () {
    return view('auth.login');
});

Route::redirect('/dashboard', '/pabrik');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('weapon', weaponController::class);
Route::resource('pabrik', pabrikController::class);
Route::resource('dataweap', dataweapController::class);
Route::resource('negara', NegaraController::class);
Route::post("weapon/soft/{id}", [weaponController::class, "soft"])->name("weapon.soft");
Route::post("pabrik/soft/{id}", [pabrikController::class, "soft"])->name("pabrik.soft");
Route::post("negara/soft/{id}", [NegaraController::class, "soft"])->name("negara.soft");



require __DIR__.'/auth.php';
