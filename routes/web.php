<?php

Auth::routes(['verify' => true]);
/*Route::get('/logout-manual', function () {
    request()->session()->invalidate();
});*/
Route::get('/{any}', 'AppController@index')->where('any', '.*');
