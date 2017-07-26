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

use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome as WelcomeEmail;

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

Route::get('welcome', function(){
	Mail::to('compuzoft@example.com', 'Compuzoft')
	->send(new WelcomeEmail('Daniel'));
});
