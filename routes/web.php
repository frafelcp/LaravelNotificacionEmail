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

Route::get('/', function () {
    return view('welcome');
});

Route::get('suscribe', function(Faker\Generator $faker){
	$user = new \App\User();
	$user->name = $faker->name;
	$user->email = $faker->email;
	$user->password = bcrypt($faker->password);
	$user->notify(new \App\Notifications\SuspiciousLogin());
	return view('notified', compact('user'));
});
