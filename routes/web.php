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
use App\Http\Controllers\WordExportController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\TeachBusController;
use App\Http\Controllers\SupervisionController;
use App\Http\Controllers\Select2AutocompleteController;

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
Route::post('/get-branches', [DropdownController::class,'getBranches'])->name('get.branches');
Route::post('/get-majors', [DropdownController::class,'getMajors'])->name('get.majors');
Route::post('/get-amphur', [DropdownController::class,'getAmphur'])->name('get.amphur');
Route::post('/get-district', [DropdownController::class,'getDistrict'])->name('get.district');
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
    Route::get('/exportToWord/{startdate}/{enddate}',[WordExportController::class,'exportToWord'])->name('exportToWord');

    
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
    Route::resource('Teach_bus', TeachBusController::class);
     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
     Route::get('/manager/Advisor-add', [AdvisorController::class, 'add'])->name('Advisor.add');
     Route::post('/manager/addteacher',[AdvisorController::class, 'addteacher'])->name('addteacher');
     Route::get('/manager/Assign_advisor', [AdvisorController::class, 'assignAdvisor'])->name('Assign.advisor');
     Route::get('/select2-autocomplete-ajax', [Select2AutocompleteController::class,'dataAjax'])->name('dataAjax');
     Route::get('/select2-autocomplete-ajax-teacher', [Select2AutocompleteController::class,'datateacher'])->name('datateacher');

     Route::get('/manager/mStudents_under_care', [SupervisionController::class, 'mStudentsUnderCare'])->name('mStudents_under_care');
     Route::get('/mUnderCareSearch', [SupervisionController::class, 'StudentsUnderCare'])->name('mUnderCare.Search');
     Route::get('/mdata/{id}', [SupervisionController::class, 'show']);
     Route::get('/manager/mstdreportta', [SupervisionController::class, 'mstdreportta'])->name('mstdreportta');
     Route::get('/mfetch-data/{id}',[SupervisionController::class, 'fetchData'])->name('mfetchData'); 
     Route::get('/mfetch-datadetail/{id}',[SupervisionController::class, 'fetchDataDetail'])->name('mfetchDataDetail');
    //  Route::get('/Addmonter-store', [Select2AutocompleteController::class,'store']);
    
    // Route::get('/manager/home', function () {
    //     return view('manager.home');
    // })->name('manager.home');'
    
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:supervision'])->group(function () {
    Route::get('/supervision/home', [HomeController::class, 'supervisionHome'])->name('supervision.home');
    Route::get('/supervision/Students_under_care', [SupervisionController::class, 'StudentsUnderCare'])->name('Students_under_care');
    Route::get('/supervision/UnderCareSearch', [SupervisionController::class, 'StudentsUnderCare'])->name('UnderCare.Search');
    Route::get('/data/{id}', [SupervisionController::class, 'show']);
    Route::get('/supervision/stdreportta', [SupervisionController::class, 'stdreportta'])->name('stdreportta');
    Route::get('/fetch-data/{id}',[SupervisionController::class, 'fetchData'])->name('fetchData'); 
    Route::get('/fetch-datadetail/{id}',[SupervisionController::class, 'fetchDataDetail'])->name('fetchDataDetail'); 
});
