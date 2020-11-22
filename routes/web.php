<?php

use Illuminate\Support\Facades\Route;


    //Route::redirect('/', app()->getLocale());

    Route::get('lang/{lang}', function ($lang) {
        if(in_array($lang , ['en','ar'])){
            if(auth()->user()){
                $user = auth()->user();
                $user->lang = $lang;
                $user->save();
            } else {
                if(session()->has('lang')){
                    session()->forget('lang');
                }
                session()->put('lang', $lang);
            }
        }else{
            if(auth()->user()){
                $user = auth()->user();
                $user->lang = 'en';
                $user->save();
            } else {
                if(session()->has('lang')){
                    session()->forget('lang');
                }
                session()->put('lang', 'en');
            }
        }
        return back();
    });

Route::group([
    'middleware' => 'Lang',
], function() {


    Route::get('/', function () {
        return view('starting_page');
    });

    Route::get('/info', function () {
        return view('info');
    })->name('info');

    Route::resource('hobby', 'HobbyController');

    Route::resource('tag','TagController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
