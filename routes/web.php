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

Route::get('/', function () {
    return view('sponsorship');
});

Route::post('/sponsorship-fill-request', [SponsorshipController::class, 'sponsorshipFillRequest']);
Route::get('/sponsorship-tracking', [SponsorshipController::class, 'sponsorshiptrack'])->middleware('auth');
Route::put('/proof-of-agreement/{id}', [SponsorshipController::class, 'proofAgreement'])->middleware('auth');
Route::put('/collector-details/{id}', [SponsorshipController::class, 'collectorDetails'])->middleware('auth');
Route::put('/after-event/{id}', [SponsorshipController::class, 'afterEvent'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-fill', [AuthController::class, 'loginFill']);
Route::get('/login-admin', [AuthController::class, 'loginAdmin']);
Route::post('/login-admin-fill', [AuthController::class, 'loginAdminFill']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::put('/sendMailTemplate/{email}/{id}', [DashboardController::class, 'sendMail'])->middleware('auth');
Route::get('/collected/{id}', [DashboardController::class, 'collected'])->middleware('auth');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth');
    Route::get('/view-request/{id}', [DashboardController::class, 'viewRequest'])->middleware('auth');
    Route::put('/request-submit/{id}', [DashboardController::class, 'requestSubmit'])->middleware('auth');
    Route::get('/calendar', [DashboardController::class, 'calendar'])->middleware('auth');
    Route::put('/status-update/{id}', [DashboardController::class, 'statusUpdate'])->middleware('auth');
    Route::put('/request-update/{id}', [DashboardController::class, 'requestUpdate'])->middleware('auth');
    Route::get('/delete/{id}', [DashboardController::class, 'delete'])->middleware('auth');
    Route::get('/trash', [DashboardController::class, 'trash'])->middleware('auth');
    Route::get('/restore/{id}', [DashboardController::class, 'restore'])->middleware('auth');
    Route::get('/permanent-delete/{id}', [DashboardController::class, 'permanentDelete'])->middleware('auth');
    Route::get('/ongoing-event-report', [DashboardController::class, 'ongoingEventReport'])->middleware('auth');
    Route::get('/event-report/{id}', [DashboardController::class, 'eventReport'])->middleware('auth');
    Route::post('/submit-report/{id}', [DashboardController::class, 'submitReport'])->middleware('auth');
    Route::put('/edit-report/{id}/{repID}', [DashboardController::class, 'submitEditReport'])->middleware('auth');
    Route::get('/blacklists', [DashboardController::class, 'blocklists'])->middleware('auth');
    Route::get('/reject/{id}', [DashboardController::class, 'reject'])->middleware('auth');
    Route::get('/block/{id}', [DashboardController::class, 'block']);
    Route::get('/remove-blacklist/{id}/{email}', [DashboardController::class, 'removeBlacklist'])->middleware('auth');
});

Route::post('/save-template/{templateName}/{id}', [DashboardController::class, 'saveTemplate'])->middleware('auth');
Route::get('downloadAll/{type}/{id}', [DashboardController::class, 'downloadAll'])->middleware('auth');
Route::get('/Blacklisted', [SponsorshipController::class, 'blacklisted']);


