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
    return view('welcome');
});

Route::get('/envio-email', function () {
    //Somente para testes
    //return \Illuminate\Support\Facades\Mail::send(new \App\Mail\AvisoInressado(\App\Models\Interessado::find(1)));
    App\Jobs\AvisoInteressado::dispatch(\App\Models\Interessado::find(1));
});
