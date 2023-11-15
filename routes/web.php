<?php

use Illuminate\Support\Facades\Route;
use Revolution\Google\Sheets\Facades\Sheets;

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

Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::post('logout', function () {
	auth()->logout();
	return redirect('/');
})->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/excel', function () {
//auth()->loginUsingId(1);
	$sheets = Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
		->sheet(config('sheets.post_sheet_id'))
		->get();

	$header = [
		'name',
		'message',
		'created_at',
	];

	$posts = Sheets::collection(header: $header, rows: $sheets);

	return view('excel', compact('posts'));
});
