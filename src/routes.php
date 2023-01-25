<?php

use Illuminate\Support\Facades\Route;

Route::get('git-log', '\EmtiazZahid\GitLogLaravel\GitLogLaravelController@index')->name('git-log');