<?php
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::group(['prefix'=>'api'],function(){
    Route::get('print','InvoiceController@print');
    Route::get('print/{ref}','InvoiceController@printOne');
    Route::get('invoiceref','InvoiceController@invoiceref');

    Route::resource('invoices','InvoiceController');
    Route::get('list','InvoiceController@list')->name('list');
    Route::resource('settings','SettingsController');


});