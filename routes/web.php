<?php

use App\Http\Controllers\AccountManagmentController;
use App\Http\Controllers\CancelSlipController;
use App\Http\Controllers\ChooseSlipController;
use App\Http\Controllers\ChooseClipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NightSlipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagmentController;
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
    // return view('admin.dashboard');
    auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/home',[DashboardController::class,'home'])->name('home');
    // admin
    Route::middleware('admin')->group(function () {
        // User Managment
        Route::get('/user-list',[UserManagmentController::class,'index'])->name('user-list');
        Route::get('/create-user',[UserManagmentController::class,'createUser'])->name('create-user');
        Route::post('/user-store',[UserManagmentController::class,'storeUser'])->name('user-store');
        Route::post('/user-edit',[UserManagmentController::class,'userEdit'])->name('user-edit');
        Route::post('/user-update',[UserManagmentController::class,'userUpdate'])->name('user-update');
        Route::post('/user-delete',[UserManagmentController::class,'userDelete'])->name('user-delete');

        // Job
        Route::get('/job-list',[JobController::class,'index'])->name('job-list');
        Route::get('/job-create',[JobController::class,'create'])->name('job-create');
        Route::post('/job-store',[JobController::class,'store'])->name('job-store');
        Route::post('/job-delete',[JobController::class,'delete'])->name('job-delete');

        Route::get('/hospital-list',[JobController::class,'hospitalList'])->name('hospital-list');
        Route::get('/hospital-create',[JobController::class,'hospitalcreate'])->name('hospital-create');
        Route::post('/hospital-store',[JobController::class,'hospitalstore'])->name('hospital-store');
        Route::post('/hospital-edit',[JobController::class,'hospitaledit'])->name('hospital-edit');
        Route::post('/hospital-update',[JobController::class,'hospitalupdate'])->name('hospital-update');
        Route::post('/hospital-delete',[JobController::class,'hospitaldelete'])->name('hospital-delete');
        Route::post('/hospital-status',[JobController::class,'hospitalstatus'])->name('hospital-status');

        // Cancel Slip
        Route::get('/pendding-cancel-slip-list',[CancelSlipController::class,'penddingCancelSlipList'])->name('pendding-cancel-slip-list');
        Route::get('/progress-cancel-slip-list',[CancelSlipController::class,'progressCancelSlipList'])->name('progress-cancel-slip-list');
        Route::get('/complete-cancel-slip-list',[CancelSlipController::class,'completeCancelSlipList'])->name('complete-cancel-slip-list');
        Route::post('/update-cancel-slip-status',[CancelSlipController::class,'updateCancelSlipStatus'])->name('update-cancel-slip-status');

        // Night Slip
        Route::get('/pendding-night-slip',[NightSlipController::class,'penddingNightSlip'])->name('pendding-night-slip');
        Route::get('/progress-night-slip',[NightSlipController::class,'progressNightSlip'])->name('progress-night-slip');
        Route::get('/complete-night-slip',[NightSlipController::class,'completeNightSlip'])->name('complete-night-slip');
        Route::post('/update-night-slip-status',[NightSlipController::class,'updateNightSlipStatus'])->name('update-night-slip-status');
        Route::post('/view-night-slip',[NightSlipController::class,'viewNightSlip'])->name('view-night-slip');
        // Account Management
        Route::get('/pendding-ammount-list',[AccountManagmentController::class,'penddingAmmountList'])->name('pendding-ammount-list');
        Route::get('/all-ammount-list',[AccountManagmentController::class,'allAmmountList'])->name('all-ammount-list');
        Route::post('/approved-transaction',[AccountManagmentController::class,'approvedTransaction'])->name('approved-transaction');
    });

    // Choose Slip

    // Route::get('/choiceSlip',[ChooseSlipController::class,'index'])->name('choiceSlip');
    // Route::get('/creatSlip',[ChooseSlipController::class,'creatSlip'])->name('creatSlip');

    Route::get('/chooseClip',[ChooseClipController::class,'index'])->name('chooseClip');
    Route::get('/createChooseSlip',[ChooseClipController::class,'creatChooseSlip'])->name('chooseSlip.creatSlip');
    Route::post('/chooseStoreslip', [ChooseClipController::class, 'storeChooseSlip'])->name('chooseSlip.storeChooseSlip');
    Route::post('/nightSlip.edit',[ChooseClipController::class,'edit'])->name('nightSlip.edit');
    Route::post('/nightSlip.update',[ChooseClipController::class,'update'])->name('nightSlip.update');
    Route::post('/nightSlip.send',[ChooseClipController::class,'send'])->name('nightSlip.send');
    // Night Slip
    Route::get('/nightSlip',[NightSlipController::class,'index'])->name('nightSlip');
    Route::get('/creatSlip',[NightSlipController::class,'creatSlip'])->name('nightSlip.creatSlip');
    Route::post('/storeslip',[NightSlipController::class,'storeslip'])->name('nightSlip.storeSlip');
    Route::post('/nightSlip.edit',[NightSlipController::class,'edit'])->name('nightSlip.edit');
    Route::post('/nightSlip.update',[NightSlipController::class,'update'])->name('nightSlip.update');
    Route::post('/nightSlip.send',[NightSlipController::class,'send'])->name('nightSlip.send');

    // CancelSlip
    Route::get('/cancelSlip',[CancelSlipController::class,'index'])->name('cancelSlip');
    Route::get('/cancelSlip-creatSlip',[CancelSlipController::class,'creatSlip'])->name('cancelSlip-creatSlip');
    Route::post('/cancelSlip-store',[CancelSlipController::class,'store'])->name('cancelSlip-store');
    Route::post('/cancelSlip-editSlip',[CancelSlipController::class,'editSlip'])->name('cancelSlip-editSlip');
    Route::post('/cancelSlip-update',[CancelSlipController::class,'update'])->name('cancelSlip-update');
    Route::post('/cancelSlip-delete',[CancelSlipController::class,'delete'])->name('cancelSlip-delete');

    // Account Management
    Route::get('/accountManagement-list',[AccountManagmentController::class,'index'])->name('accountManagement-list');
    Route::get('/create-transaction',[AccountManagmentController::class,'create'])->name('create-transaction');
    Route::post('/store-transaction',[AccountManagmentController::class,'store'])->name('store-transaction');
    Route::post('/edit-transaction',[AccountManagmentController::class,'edit'])->name('edit-transaction');
    Route::post('/update-transaction',[AccountManagmentController::class,'update'])->name('update-transaction');
    Route::post('/send-transaction',[AccountManagmentController::class,'send'])->name('send-transaction');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
