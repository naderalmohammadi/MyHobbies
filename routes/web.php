<?php

use Illuminate\Support\Facades\Route;

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

    Route::resource('user','UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hobby/tag/{tag_id}', 'hobbyTagController@getFilteredHobbies');

// attach tag to hobby
Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', 'hobbyTagController@attachTag');
// detach tag from hobby
Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', 'hobbyTagController@detachTag');
// delete hobby image route
Route::get('/delete-images/hobby/{hobby_id}', 'HobbyController@deleteImages');
// delete user image route
Route::get('/delete-images/user/{user_id}', 'UserController@deleteImages');

