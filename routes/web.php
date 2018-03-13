<?php

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
//create login, register, reset_password routes
Auth::routes();

//Route to the root page
Route::get('/', 'PageController@dashboard')->name('dashboard');

//Route to Health Facilities
Route::get('/hospitals', 'PageController@hospitals')->name('hospitals');
Route::get('/referrals', 'PageController@referrals')->name('referral');
Route::get('/health_center_II', 'PageController@healthCenterII')->name('HCII');
Route::get('/health_center_III', 'PageController@healthCenterIII')->name('HCIII');
Route::get('/health_center_IV', 'PageController@healthCenterIV')->name('HCIV');

//Route to general Settings
Route::get('/settings', 'PageController@settings')->name('settings');
//Route to general reports
Route::get('/reports', 'PageController@reports')->name('reports');

//drugs resource route
Route::resource('drugs', 'DrugController');
//Route::get('delete/{id}','DrugController@destroy');

//route to health facilities
Route::resource('health_facilities', 'HealthFacilityController');

//Route to regions
Route::resource('regions', 'RegionController');
//Route to staff
Route::resource('staffs', 'StaffController')->except('edit', 'update');

//Route to districts
Route::resource('districts', 'DistrictController');
Route::resource('health_sub_districts', 'HealthSubDistrictController');

Route::resource('orders', 'OrderController');
