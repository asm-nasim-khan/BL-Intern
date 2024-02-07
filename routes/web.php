<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExtentionController;
use App\Http\Controllers\TxtFileController;
use App\Http\Controllers\dataController;


use App\Http\Controllers\ZipFileController;

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



Route::get('/read-xml', [XmlController::class, 'readXmlFile']);
Route::get('/read-excel', [ExcelController::class, 'readExcel']);
Route::get('/write-excel', [ExcelController::class, 'createExcel']);
Route::get('/extension', [ExtentionController::class, 'extension']);
Route::get('/zipc', [ZipFileController::class, 'createZip']);
Route::get('/txt', [TxtFileController::class, 'create']);
Route::get('/database', [dataController::class, 'showall']);





