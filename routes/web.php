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
    //use the request() function to grab the value of the key 'name'
    // from the query string and set that as the value of the variable $name
    $name = request('name');

    // use the view() function to display the view named 'test'.
    // the second argument is an array. the keys in this array 
    // will now be available to the 'test' view in test.blade.php
    return view('test', [
        'name' => $name
    ]);
});
