<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HolidayController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resources([
	'holidays' => HolidayController::class
]);

Route::group(['prefix' => 'admin'], function() {
	Route::get('news/add', [Controllers\Admin\NewsController::class, 'add']);
});

Route::group(['prefix' => 'excel', 'as' => 'excel.'], function () {
	Route::any('', function () {
		return view('excel.index');
	})->name('top');
	Route::get('download', [ExcelController::class, 'download'])->name('download');
});

Route::group(['prefix' => 'bladeComponent'], function () {

	Route::get('/');
});
