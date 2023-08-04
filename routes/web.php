<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ExamenController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Auth\AuthConroller;
use App\Http\Controllers\SecretaireController;
use App\Models\User;
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
    // User::create([
    //     'name' => 'Jennifer',
    //     'postnom'=> 'Smith',
    //     'matricule'=> 'MA00213',
    //     'prenom' => 'Mary',
    //     'sexe'=>'F',
    //     'adresse' => 'Rue de la cadena n° 145, Paris',
    //     'telephone' => '0827786347',
    //     'role'=>'admin',
    //     'date_de_naissance' => now(),
    //     'email' => 'admin@example.com',
    //     'password' => bcrypt('123456')
    // ]);
    // dd('Success');
    return view('welcome');
})->name('home');

Route::get('/login',[AuthConroller::class,'login'])->name('login');
Route::post('/login',[AuthConroller::class,'dologin']);
Route::get('/logout',[AuthConroller::class,'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'roleControl'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('patients',PatientController::class);
    Route::resource('examens',ExamenController::class);
});
Route::prefix('secretaire')->name('secretaire.')->middleware(['auth', 'roleControl'])->group(function () {
    Route::get('/', [SecretaireController::class, 'index'])->name('home');
});

