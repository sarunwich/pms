<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ApprentyController;
use App\Http\Controllers\ReportstdController;
Use App\Http\Controllers\PicreportController;

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
Route::post('/get-branches', [DropdownController::class,'getBranches'])->name('get.branches');
Route::post('/get-majors', [DropdownController::class,'getMajors'])->name('get.majors');
Route::post('/get-amphur', [DropdownController::class,'getAmphur'])->name('get.amphur');
Route::post('/get-district', [DropdownController::class,'getDistrict'])->name('get.district');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::resource('Apprenty', ApprentyController::class);
    Route::resource('Agency', AgencyController::class);
    Route::resource('Reportstd', ReportstdController::class);
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/Register-internship', [InternshipController::class, 'rinternship'])->name('Register.internship');
    Route::get('/Internship-Registration-Results', [InternshipController::class, 'internshiprr'])->name('Internship.Registration.Results');
    Route::get('/Internship-form', [InternshipController::class, 'Internship_form'])->name('Internship.form');
    Route::get('/Internship-status', [InternshipController::class, 'Internship_status'])->name('Internship.status');
    Route::get('/Internship-report', [InternshipController::class, 'Internship_reports'])->name('Internship.report');
    Route::get('/Internship-information', [InternshipController::class, 'Internship_information'])->name('Internship.information');
    Route::get('/Internship-edit', [InternshipController::class, 'Internship_edit'])->name('Internship.edit');
    Route::get('/Internship-print', [InternshipController::class, 'Internship_print'])->name('Internship.print');
    Route::post('/Internshipformsave', [InternshipController::class, 'Internship_form_save'])->name('Internship.form.save');
    Route::get('/Agency-autocomplete', [AgencyController::class,'dataAjax'])->name('autocomplete');
    Route::get('/delReportstd/{Reportstd}', [ReportstdController::class,'destroy'])->name('del.Reportstd');
    Route::get('/delPicreport/{Picreport}', [PicreportController::class,'destroy'])->name('del.Picreport');
    Route::get('/redit/{id}',  [ReportstdController::class,'edit'])->name('edit.Reportstd');
    Route::put('/Reportstdupdate/{id}',  [ReportstdController::class,'update'])->name('Reportstdupdate.Reportstd');
    Route::post('/addpic',  [PicreportController::class,'addpic'])->name('addpic');

    
});

  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    
});
