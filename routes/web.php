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

/* Dashboard and Patient Routes */

Route::get('/', 'DashboardController@index');
Route::resource('patients', 'PatientsController');
Route::get('/patients/show/{id}', 'PatientsController@show');
Route::post('/patients/search', 'DashboardController@search_patient')->name('search');

/* Dashboard and Patient Routes */

/* Department Routes */

Route::resource('departments', 'DepartmentsController');

/* Department Routes */


/* Users Routes */

Route::resource('users', 'UsersController');

/* Users Routes */


/* Dispositions Routes */

Route::resource('dispositions', 'PatientRequestDispositionsController');

/* Dispositions Routes */


/* PatientRequests Routes */

Route::resource('patient_requests', 'PatientRequestsController');

/* PatientRequests Routes */


/* Analytics Routes */
Route::get('/print/', [ 'as' => 'analytics.print', 'uses' => 'AnalyticsController@print']);
/* Analytics Routes */