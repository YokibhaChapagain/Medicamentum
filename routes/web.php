<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PharmacyRegisterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\MedicineController;
use GuzzleHttp\Middleware;

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
Route::get('dashboard',[DashboardController::class,'index']);
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('logout',[LoginController::class,'performlogout'])->name('logout.perform');

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/pharmacy/register', [PharmacyRegisterController::class, 'show'])->name('pharmacy.register');
Route::post('/pharmacy/register', [PharmacyRegisterController::class, 'store']);


Route::group(['middleware' => ['auth', 'isloggedin','user'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::group(['middleware' => ['auth','isloggedin', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware' => ['auth','isloggedin', 'pharmacy'], 'prefix' => 'pharmacy'], function () {
    Route::get('/dashboard', [PharmacyController::class, 'index'])->name('pharmacy.dashboard');
    Route::get('/addmedicine', [MedicineController::class, 'show']);
    Route::post('/addmedicine', [MedicineController::class, 'store']);
    Route::get('/inventory', [MedicineController::class, 'inventory']);
    Route::get('edit/{id}',[MedicineController::class,'edit'])->name('edit');
    Route::put('updatemedicine/{id}',[MedicineController::class,'update'])->name('updatemedicine');
    Route::get('delete/{id}',[MedicineController::class,'remove'])->name('delete');
});

