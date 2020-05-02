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
Route::get('/patient_requests/create/{id}', array('as' => 'create_request', 'uses' => 'PatientRequestsController@create'));
//Route::get('/patient_requests/create/{id}', 'PatientRequestsController@create');
Route::post('/patient_requests/release/{id}', [ 'as' => 'patient_requests.release', 'uses' => 'PatientRequestsController@release'] );
Route::post('/patient_requests/expired/{id}', [ 'as' => 'patient_requests.expired', 'uses' => 'PatientRequestsController@expired'] );
Route::get('/patient_requests/show/{id}', [ 'as' => 'patient_requests.show', 'uses' => 'PatientRequestsController@show'] );


/* PatientRequests Routes */


/* Analytics Routes */
Route::get('/analytics/patient_analytics', 'AnalyticsController@patient_analytics');
Route::get('/analytics/disposition_analytics', 'AnalyticsController@disposition_analytics');
Route::get('/analytics/disposition_analytics_print', [ 'as' => 'analytics.disposition_analytics_print', 'uses' => 'AnalyticsController@disposition_analytics_print']);

Route::get('/analytics/department_analytics', 'AnalyticsController@department_analytics');
Route::get('/analytics/department_analytics_print', [ 'as' => 'analytics.department_analytics_print', 'uses' => 'AnalyticsController@department_analytics_print']);

Route::get('/patient_analytics_print/', [ 'as' => 'analytics.patient_analytics_print', 'uses' => 'AnalyticsController@patient_analytics_print']);
/* Analytics Routes */