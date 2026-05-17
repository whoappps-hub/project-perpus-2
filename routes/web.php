<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {

    return redirect()->route(
        'peminjaman.index'
    );

});

Route::resource(
    'peminjaman',
    PeminjamanController::class
);