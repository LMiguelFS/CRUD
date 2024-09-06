<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menu');
});

//Controller autor
Route::resource('/autor', AutorController::class);


//Controller Libros
Route::resource('/libro',LibroController::class);



Route::get('/menuAutor', function () {
    return view('menuAutores');
});

Route::get('/menuLibro',function(){
    return view('menuLibros');
});
