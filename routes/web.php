<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', function () {
    return view('pages.dashboard');
});

// view
Route::get('/boiler/home-page', 'DashboardController@dashboard')->name('boiler.home-page');
// speedmeter feed water 
Route::get('/boiler/level-feed-water', 'SpeedMeterController@speedMeterLevelFeedWater')->name('boiler.level-feed-water');
// speedmeter stream pressure
Route::get('/boiler/stream-pressure', 'SpeedMeterController@speedMeterStreamPressure')->name('boiler.stream-pressure');
// speedmeter lh temperature
Route::get('/boiler/lh-temperature', 'SpeedMeterController@speedMeterLHTemp')->name('boiler.lh-temp');
// speedmeter RHTemp
Route::get('/boiler/rh-temperature', 'SpeedMeterController@speedMeterRHTemp')->name('boiler.rh-temp');
// speedmeter LH HD FAN
Route::get('/boiler/LHFDFan', 'SpeedMeterController@speedMeterLHFDFan')->name('boiler.LHFDFan');
// speedmeter RH FD Fan
Route::get('/boiler/RHFDFan', 'SpeedMeterController@speedMeterRHFDFan')->name('boiler.RHFDFan');
// speedmeter ID FAN
Route::get('/boiler/IDFan', 'SpeedMeterController@speedMeterIDFan')->name('boiler.ID-Fan');
// speedmeter LH Stocker
Route::get('/boiler/LHStocker', 'SpeedMeterController@speedMeterLHStocker')->name('boiler.LH-Stocker');
// speedmeter RH Stocker
Route::get('/boiler/RHStocker', 'SpeedMeterController@speedMeterRHStocker')->name('boiler.RH-Stocker');


// line chart stream pressure
Route::get('/boiler/line-chart-pvsteam', 'lineChartController@linechartPvSteam')->name('boiler.line-chart-pvsteam');
// line chart level feed water
Route::get('/boiler/line-chart-feedwater', 'lineChartController@linechartLevelFeedWater')->name('boiler.line-chart-feedwater');
// line chart lh temp
Route::get('/boiler/line-chart-LHTemp', 'lineChartController@linechartLHTemp')->name('boiler.line-chart-LHTemp');
// line chart RHtemp
Route::get('/boiler/line-chart-RHTemp', 'lineChartController@linechartRHTemp')->name('boiler.line-chart-RHTemp');
// linechart LH HD FAN
Route::get('/boiler/line-chart-LHFDFan', 'lineChartController@linechartLHFDFan')->name('boiler.line-chart-LHFDFan');
// linechart RH HD FAN
Route::get('/boiler/line-chart-RHFDFan', 'lineChartController@linechartRHFDFan')->name('boiler.line-chart-RHFDFan');
// linechart ID FAN
Route::get('/boiler/line-chart-IDFan', 'lineChartController@linechartIDFan')->name('boiler.line-chart-ID-Fan');
// linechart LHStoker
Route::get('/boiler/line-chart-LHStoker', 'lineChartController@linechartLHStoker')->name('boiler.line-chart-LH-Stoker');
// linechart RHStoker
Route::get('/boiler/line-chart-RHStoker', 'lineChartController@linechartRHStoker')->name('boiler.line-chart-RH-Stoker');


// task auth login
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send-event', function () {
    broadcast(new \App\Events\BoilerEvent());
});
