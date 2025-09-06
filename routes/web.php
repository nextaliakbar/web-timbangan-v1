<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layouts.auth.index');
})->name('login')->middleware('guest:admin');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function() {
    
    Route::get('/peran-user', function() {
        return view('layouts.admin.peran-user.index');
    })
    ->name('peran-user')
    ->middleware('module:Peran User');
    
    Route::get('/user-timbangan', function(){
        return view('layouts.admin.user-timbangan.index');
    })
    ->name('user-timbangan')
    ->middleware('module:User Timbangan');
    
    Route::get('/serah-terima/{plant}', function($plant){
        return view('layouts.admin.serah-terima.index', ['plant' => $plant]);
    })
    ->name('serah-terima')
    ->middleware('module:Serah Terima');
    
    Route::get('/timbangan/{plant}', function($plant) {
        return view('layouts.admin.timbangan.index', ['plant' => $plant]);
    })
    ->name('timbangan')
    ->middleware('module:Timbangan');
    
    Route::get('/timbangan/{plant}/sunfish', function($plant) {
        return view('layouts.admin.timbangan.sunfish.index', ['plant' => $plant]);
    })
    ->name('timbangan.sunfish');
    
    Route::get('/konversi-jo', function() {
        return view('layouts.admin.konversi-jo.index');
    })
    ->name('konversi-jo');
    
    Route::get('/ganti-jo', function() {
        return view('layouts.admin.ganti-jo.index');
    })
    ->name('ganti-jo')
    ->middleware('module:Ganti JO');
    
    Route::get('/formula/{plant}', function($plant) {
        return view('layouts.admin.formula.index', ['plant' => $plant]);
    })
    ->name('formula')
    ->middleware('module:Formula');
    
    Route::get('/kartu-stok/{plant}', function($plant) {
        return view('layouts.admin.kartu-stok.index', ['plant' => $plant]);
    })
    ->name('kartu-stok')
    ->middleware('module:Kartu Stok');
});
