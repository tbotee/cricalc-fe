<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LocationStatisticsController;
use App\Http\Controllers\RegionStatisticsController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::post('/', [WelcomeController::class, 'search'])->name('welcome.search');

Route::get('/preturi-apartamentelor-in-judetul/{regionSlug}', [RegionStatisticsController::class, 'show'])
    ->name('region.show')
    ->middleware('check.location');

Route::get('/preturi-apartamentelor-in-judetul/{regionSlug}/{date}', [RegionStatisticsController::class, 'showByDate'])
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

Route::view('/politica-de-confidențialitate', 'privacy')->name('privacy');
Route::view('/termeni-si-conditii', 'terms')->name('terms');
