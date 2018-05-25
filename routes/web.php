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
Route::get('/', function(){
    return view('newindex');
});
Route::get('/old', function(){
    return view('pages.index');
});
Route::get('/about', function(){
    return view('pages.about');
});
Route::get('/contact', function(){
    return view('pages.contact');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('verify');

Route::middleware(['auth'])->group(function () {
    // Put all routes that need to be logged in for in here

    Route::get('/verify', function() {
        return view('verification');
    });

    Route::middleware(['verify'])->group(function() {
        // Put all the routes that needs users to be verified for in here
        Route::get('/domains',         'DomainsController@index');
        Route::get('/domains/create',  'DomainsController@create');
        Route::post('/domains/create', 'DomainsController@store');

        Route::get('/domains/update', function () {
            return view('domains.update', [
                'user' => Auth()->user(),
            ]);
        });
        Route::post('/domains/update', 'DomainsController@updateDomains');

        Route::post('/domains/delete',  'DomainsController@deleteDomains');
        Route::post('/domains/enable',  'DomainsController@enableDomains');
        Route::post('/domains/disable', 'DomainsController@disableDomains');
    });
});