<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Bms\Chiller;
use App\Livewire\Bms\Index as bmsindex;
use App\Livewire\Bms\Tank;
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
Route::group(['prefix'=>'bms','as'=>'bms.'], function(){
    Route::get('/',bmsindex::class)->name('index');
    Route::get('/chiller/{id}',Chiller::class)->name('chiller');
    Route::get('/tank',Tank::class)->name('tank');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
