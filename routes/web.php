<?php

use Illuminate\Http\Request;
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
        Route::get('/sa/{clickdate}', [\App\Http\Controllers\Calendar\IndexController::class, 'show'])->name('calendar.spindex');
    }
);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard', ["da" => now()->format('Y-m')]);
})->middleware(['auth'])->name('dashboard');

Route::POST('/dashboard', function (Request $request) {

    return view('dashboard', ["da" => $request->input('Mo')]);
})->middleware(['auth']);
require __DIR__ . '/auth.php';
