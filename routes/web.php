<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\authController;
use App\Http\Controllers\InflowController;
use App\Http\Controllers\OutflowController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\resetPasswordController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\WarehousesController;
use App\Mail\restorePasswordMail;
use App\Models\inflow;
use App\Models\tracking;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [RegistrationController::class, 'tracking']);
Route::get('/viewall', [RegistrationController::class, 'viewall']);
Route::get('/registration/create', [RegistrationController::class, 'registration']);
Route::post('/registration/store', [RegistrationController::class, 'store']);
Route::post('/registration/update', [RegistrationController::class, 'update']);
Route::get('/registeration/track/search/{cnic}', [RegistrationController::class, 'trackingSearch']);
Route::post('/registeration/edit/', [RegistrationController::class, 'verifyPassword']);
Route::post('/registeration/changePassword/', [RegistrationController::class, 'changePassword']);
Route::get('/admin', [authController::class, 'signin'])->name('login');
Route::post('/admin', [authController::class, 'attempt_signin']);
Route::get('/test', [settingsController::class, 'test']);
Route::get('/clear-cache', function() {
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    return redirect('/dashboard')->with('msg', 'Project Optimized');
});

Route::get("/password/forgot/{userName}",[resetPasswordController::class, 'verify']);
Route::get("/password/restore/{email}/{token}",[resetPasswordController::class, 'restore']);
Route::post("/password/restore",[resetPasswordController::class, 'store']);

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [authController::class, 'dashboard']);
    Route::get('/logout', [authController::class, 'logout']);
    Route::get('/settings', [settingsController::class, 'settings']);
    Route::get('/activities', [settingsController::class, 'activity']);
    Route::get('/clearActivityLogSA', [settingsController::class, 'clear_log']);
    Route::get('/deleteActivityLogSA/{id}', [settingsController::class, 'delete_log']);
    Route::post('settings/save/basics', [settingsController::class, 'saveBasics']);
    Route::post('settings/save/userName', [settingsController::class, 'saveUserName']);
    Route::post('settings/save/password', [settingsController::class, 'savePassword']);
    Route::post('settings/setLanguage', [settingsController::class, 'changeLanguage']);

    Route::get('/users', [authController::class, 'users']);
    Route::get('/user/add', [authController::class, 'addUser']);
    Route::post('/user/create', [authController::class, 'create']);
    Route::get('/user/edit/{id}', [authController::class, 'edit']);
    Route::post('/user/update/{id}', [authController::class, 'update']);
    Route::post('/user/assignRoles/{id}', [authController::class, 'assignRoles']);
    Route::post('/user/assignPermissions/{id}', [authController::class, 'assignPermissions']);

    Route::get('/roles', [rolesController::class, 'index']);
    Route::get('/role/delete/{id}', [rolesController::class, 'delete']);
    Route::get('/role/edit/{id}', [rolesController::class, 'edit']);
    Route::post('/role/update/{id}', [rolesController::class, 'update']);
    Route::post('/role/assignPermissions/{id}', [rolesController::class, 'assignPermissions']);
    /* Route::get('/reset', function() {
        Artisan::call('migrate:fresh --seed');

        return redirect('/dashboard')->with('msg', 'Reset Successful');
    }); */

    Route::get('/registraions/list/{type}', [RegistrationController::class, 'list']);
    Route::get('/registraions/edit/{id}/{admin}', [RegistrationController::class, 'adminEdit']);
    Route::get('/registration/view/{id}', [RegistrationController::class, 'view']);
    Route::get('/registration/delete/{id}', [RegistrationController::class, 'delete']);
    Route::get('/registration/reApprove/{id}', [RegistrationController::class, 'reApprove']);
    Route::post('/registraion/status', [RegistrationController::class, 'changeStatus']);
    Route::post('/registeration/admin/changepassword', [RegistrationController::class, 'adminChangePassword']);
    Route::post('/app/forwarding/', [TrackingController::class, 'forwarding']);
    Route::post('/app/finalize', [TrackingController::class, 'finalize']);
    Route::post('/app/suspend', [TrackingController::class, 'suspend']);

});
