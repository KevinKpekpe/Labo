<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BonLaboController;
use App\Http\Controllers\Admin\BonLaboDetailsController;
use App\Http\Controllers\Admin\DocteurController as AdminDocteurController;
use App\Http\Controllers\Admin\ExamenController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\SecretaireController as AdminSecretaireController;
use App\Http\Controllers\Auth\AuthConroller;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordFirstController;
use App\Http\Controllers\DocteurController;
use App\Http\Controllers\GenerateFiche;
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

// Route::get('/', function () {
//     // User::create([
//     //     'name' => 'Jennifer',
//     //     'postnom'=> 'Smith',
//     //     'matricule'=> 'MA00213',
//     //     'prenom' => 'Mary',
//     //     'sexe'=>'F',
//     //     'adresse' => 'Rue de la cadena n° 145, Paris',
//     //     'telephone' => '0827786347',
//     //     'role'=>'admin',
//     //     'date_de_naissance' => now(),
//     //     'email' => 'admin@example.com',
//     //     'password' => bcrypt('123456')
//     // ]);
//     // dd('Success');
//     return view('welcome');
// })->name('home');
Route::get('/',function(){
    return 'welcome';
})->middleware('auth');
Route::get('/login',[AuthConroller::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthConroller::class,'dologin'])->middleware('guest');
Route::get('/logout',[AuthConroller::class,'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'roleControl'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('patients',PatientController::class);
    Route::resource('examens',ExamenController::class);
    Route::resource('secretaires',AdminSecretaireController::class);
    Route::resource('docteurs',AdminDocteurController::class);
    Route::resource('bonlabos',BonLaboController::class);
    Route::get('bonlabos/{bonlaboId}/results', [BonLaboDetailsController::class, 'edit'])->name('bonlabo-details.edit');
    Route::post('bonlabos/{bonlaboId}/update-results', [BonLaboDetailsController::class, 'update'])->name('bonlabo-details.update');
});
Route::prefix('secretaire')->name('secretaire.')->middleware(['auth', 'roleControl','checkPasswordChange'])->group(function () {
    Route::get('/', [SecretaireController::class, 'index'])->name('home');
});
Route::prefix('docteur')->name('docteur.')->middleware(['auth', 'roleControl','checkPasswordChange'])->group(function () {
    Route::get('/', [DocteurController::class, 'index'])->name('home');
    Route::get('/{id}', [DocteurController::class, 'show'])->name('show.detail');
});

Route::get('/forgotPassword',[ForgotPasswordController::class,'forgotPassword'])->name('forget.Password');
Route::post('/forgotPassword',[ForgotPasswordController::class,'forgotPasswordPost'])->name('forget.Password.post');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/reset-password',[ForgotPasswordController::class,'resetPasswordPost'])->name('reset.password.post');

// PDF

Route::get('/pdf/{id}',[GenerateFiche::class,'createPDF'])->name('createPDF');

Route::get('/password/change', [PasswordFirstController::class, 'showChangeForm'])->name('password.change');
Route::post('/password/update', [PasswordFirstController::class, 'update'])->name('password.update');
