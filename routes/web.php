<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SponsorshipController;

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

//---------CLIENT SIDE ROUTES--------------------------------------------
Route::get('/sponsorship', function () {
    return view('sponsorship');
});
Route::post('/sponsorship-fill-request', [SponsorshipController::class, 'sponsorshipFillRequest']);
Route::get('/sponsorship-tracking', [SponsorshipController::class, 'sponsorshiptrack'])->middleware('auth');
Route::put('/proof-of-agreement/{id}', [SponsorshipController::class, 'proofAgreement'])->middleware('auth');
Route::put('/collector-details/{id}', [SponsorshipController::class, 'collectorDetails'])->middleware('auth');
Route::put('/after-event/{id}', [SponsorshipController::class, 'afterEvent'])->middleware('auth');
Route::get('/Blacklisted', [SponsorshipController::class, 'blacklisted']);
Route::get('/submitted', [SponsorshipController::class, 'submitted']);


//------GENERAL ROUTES-----------------------------------------------------------------------
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-fill', [AuthController::class, 'loginFill']);
Route::get('/login-admin', [AuthController::class, 'loginAdmin'])->name('admin.login');
Route::post('/login-admin-fill', [AuthController::class, 'loginAdminFill']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


//--- ADMIN SIDE ROUTES------------------------------------------------------
Route::put('/sendMailTemplate/{email}/{id}', [DashboardController::class, 'sendMail'])->middleware(['auth', 'only-admin']);
Route::get('/collected/{id}', [DashboardController::class, 'collected'])->middleware(['auth', 'only-admin']);

Route::prefix('')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'only-admin']);
    Route::get('/view-request/{id}', [DashboardController::class, 'viewRequest'])->middleware(['auth', 'only-admin']);
    Route::put('/request-submit/{id}', [DashboardController::class, 'requestSubmit'])->middleware(['auth', 'only-admin']);
    Route::get('/calendar', [DashboardController::class, 'calendar'])->middleware(['auth', 'only-admin']);
    Route::put('/status-update/{id}', [DashboardController::class, 'statusUpdate'])->middleware(['auth', 'only-admin']);
    Route::put('/request-update/{id}', [DashboardController::class, 'requestUpdate'])->middleware(['auth', 'only-admin']);
    Route::get('/delete/{id}', [DashboardController::class, 'delete'])->middleware(['auth', 'only-admin']);
    Route::get('/trash', [DashboardController::class, 'trash'])->middleware(['auth', 'only-admin']);
    Route::get('/restore/{id}', [DashboardController::class, 'restore'])->middleware(['auth', 'only-admin']);
    Route::get('/permanent-delete/{id}', [DashboardController::class, 'permanentDelete'])->middleware(['auth', 'only-admin']);
    Route::get('/ongoing-event-report', [DashboardController::class, 'ongoingEventReport'])->middleware(['auth', 'only-admin']);
    Route::get('/event-report/{id}', [DashboardController::class, 'eventReport'])->middleware(['auth', 'only-admin']);
    Route::post('/submit-report/{id}', [DashboardController::class, 'submitReport'])->middleware(['auth', 'only-admin']);
    Route::put('/edit-report/{id}/{repID}', [DashboardController::class, 'submitEditReport'])->middleware(['auth', 'only-admin']);
    Route::get('/blacklists', [DashboardController::class, 'blocklists'])->middleware(['auth', 'only-admin']);
    Route::get('/reject/{id}', [DashboardController::class, 'reject'])->middleware(['auth', 'only-admin']);
    Route::get('/block/{id}', [DashboardController::class, 'block'])->middleware(['auth', 'only-admin']);
    Route::get('/remove-blacklist/{id}/{email}', [DashboardController::class, 'removeBlacklist'])->middleware(['auth', 'only-admin']);
});

Route::post('/save-template/{templateName}/{id}', [DashboardController::class, 'saveTemplate'])->middleware(['auth', 'only-admin']);
Route::get('downloadAll/{type}/{id}', [DashboardController::class, 'downloadAll'])->middleware(['auth', 'only-admin']);



