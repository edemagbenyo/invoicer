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
    Route::get('reports/list','ReportController@list')->name('reports.list');
    Route::get('surveys/list','SurveyController@list')->name('surveys.list');
    Route::get('certificates/list','CertificateController@list')->name('certificates.list');
    Route::get('reports/print/{reportid}','ReportController@printOne');
    Route::get('certificates/print/{certificateid}','CertificateController@printOne');
    Route::get('surveys/print/{surveyid}','SurveyController@printOne');
    Route::resource('settings','SettingsController');
    Route::resource('surveys','SurveyController');
    Route::resource('reports','ReportController');
    Route::resource('certificates','CertificateController');


});