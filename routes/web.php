<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LocationStatisticsController;
use App\Http\Controllers\RegionStatisticsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::post('/', [WelcomeController::class, 'search'])->name('welcome.search');

//Route::get('/preturi-apartamentelor-in-judetul/{regionSlug}', [RegionStatisticsController::class, 'show'])
//    ->name('region.show')
//    ->middleware('check.location');

Route::get('/preturi-apartamentelor-in-judetul/{regionSlug}/{date?}', [RegionStatisticsController::class, 'showByDate'])
    ->name('region.show')
    ->middleware('check.location');

Route::get('/preturi-apartamentelor/{numberOfRooms}/in-judetul/{regionSlug}', [RegionStatisticsController::class, 'show_by_room_number'])
    ->name('region.show_by_room_number')
    ->middleware('check.location');

Route::get('/preturile-apartamentelor/{locationSlug}/judetul/{regionSlug}/', [LocationStatisticsController::class, 'show'])
    ->name('location.show')
    ->middleware('check.location');

Route::get('/preturile-apartamentelor/{numberOfRooms}/{locationSlug}/judetul/{regionSlug}/', [LocationStatisticsController::class, 'show_by_room_number'])
    ->name('location.show_by_room_number')
    ->middleware('check.location');

Route::get('/despre-noi', [AboutUsController::class, 'show'])
    ->name('about_us');

Route::get('/contact', [ContactUsController::class, 'show'])
    ->name('contact_us');
Route::post('/contact', [ContactUsController::class, 'submit'])
    ->name('contact_us.submit');

Route::view('/politica-de-confidentialitate', 'privacy')->name('privacy');
Route::view('/termeni-si-conditii', 'terms')->name('terms');

Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
});

Route::get('/secret-email-log-viewer', function () {
    $logFilePath = storage_path('logs/email.log');

    if (!File::exists($logFilePath)) {
        abort(404, 'Log file not found.');
    }
    $logContents = File::get($logFilePath);

    return response('<pre>' . htmlspecialchars($logContents) . '</pre>');
})->name('secret.email.log');

Route::get('/visitors', [VisitorController::class, 'index']);
