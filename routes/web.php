<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::post('attend/{user}', [DashboardController::class, 'attend'])->name('attend');
    Route::get('registered-users', [DashboardController::class, 'all'])->name('all');
    Route::get('present-users', [DashboardController::class, 'present'])->name('present');
    Route::get('new-believers', [DashboardController::class, 'new'])->name('new');
    Route::get('church-members', [DashboardController::class, 'members'])->name('members');
    Route::get('sunday-school', [DashboardController::class, 'sundaySchool'])->name('sundaySchool');
    Route::get('youth', [DashboardController::class, 'youth'])->name('youth');
    Route::get('over-comers', [DashboardController::class, 'overComers'])->name('overComers');
    Route::get('male', [DashboardController::class, 'male'])->name('male');
    Route::get('female', [DashboardController::class, 'female'])->name('female');
    Route::get('needing-accommodation', [DashboardController::class, 'needAccommodation'])->name('needAccommodation');
    
    //Provinces
    Route::get('provinces', [ProvinceController::class, 'show'])->name('provinces');
    Route::get('bulawayo', [ProvinceController::class, 'bulawayo'])->name('bulawayo');
    Route::get('harare', [ProvinceController::class, 'harare'])->name('harare');
    Route::get('manicaland', [ProvinceController::class, 'show'])->name('manicaland');
    Route::get('mashonaland-central', [ProvinceController::class, 'mashonalandCentral'])->name('mashonalandCentral');
    Route::get('mashonaland-east', [ProvinceController::class, 'mashonalandEast'])->name('mashonalandEast');
    Route::get('mashonaland-west', [ProvinceController::class, 'mashonalandWest'])->name('mashonalandWest');
    Route::get('masvingo', [ProvinceController::class, 'masvingo'])->name('masvingo');
    Route::get('matebeleland-north', [ProvinceController::class, 'matebelelandNorth'])->name('matebelelandNorth');
    Route::get('matebeleland-south', [ProvinceController::class, 'matebelelandSouth'])->name('matebelelandSouth');
    
    
    
    
    
    
    
});
