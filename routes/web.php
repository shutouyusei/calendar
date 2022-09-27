<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

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

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/calendar/mypage', [CalendarController::class, 'mydata'])->name('calendar.mypage');
        Route::resource('calendar', CalendarController::class);
        Route::get('/sa/{clickdate}', [\App\Http\Controllers\Calendar\IndexCotroller::class, 'show'])->name('calendar.spindex');
    }
);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard', ["da" => "2022-09"]);
})->middleware(['auth'])->name('dashboard');

Route::POST('/dashboard', function () {

    return view('dashboard', ["da" => $_POST['Mo']]);
})->middleware(['auth']);
require __DIR__ . '/auth.php';
