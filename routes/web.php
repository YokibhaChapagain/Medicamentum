<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PharmacyRegisterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PreparedQuotationController;
use App\Http\Controllers\UploadedPrescriptionController;
use Illuminate\Auth\Events\Login;
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

Route::get('/emailVerify', [LoginController::class, 'emailVerifyGet'])->name('email.verify.get');
Route::post('/email-verify', [LoginController::class, 'emailVerifyPost'])->name('email.verify.post');
Route::get('/password-reset/{token}', [LoginController::class, 'passwordResetGet'])->name('password.reset.get');
Route::post('/password-reset', [LoginController::class, 'passwordResetPost'])->name('password.reset.post');

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/pharmacy/register', [PharmacyRegisterController::class, 'show'])->name('pharmacy.register');
Route::post('/pharmacy/register', [PharmacyRegisterController::class, 'store']);



Route::group(['middleware' => ['auth', 'isloggedin', 'user'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user-details', [UserController::class, 'display'])->name('user.details');
    Route::get('/order', [OrderController::class, 'index'])->name('user.order');
    Route::get('/quotation-details/{id}', [UploadedPrescriptionController::class, 'Details']);
    Route::get('/history', [PrescriptionController::class, 'index']);
    Route::get('/upload-prescription', [PrescriptionController::class, 'create'])->name('upload-prescription');
    Route::get('/prepared-quotation', [PreparedQuotationController::class, 'index']);
    Route::post('/prescription-store', [PrescriptionController::class, 'store']);
    Route::post('/status-update', [PreparedQuotationController::class, 'store']);

    Route::get('/{user}', [UserController::class, 'update'])->name('user.update');
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
    Route::get('prescription-list', [PrescriptionController::class, 'show']);
    Route::get('uploaded-prescription/{id}', [UploadedPrescriptionController::class, 'index']);
    Route::post('/quotation-add', [QuotationController::class, 'store']);
    Route::get('accept', [PharmacyController::class, 'accept']);
    Route::get('reject', [PharmacyController::class, 'reject']);
    Route::get('pending', [PharmacyController::class, 'pending']);

});

Route::get('/test',function(){
return view('user.upload-prescription');
});


