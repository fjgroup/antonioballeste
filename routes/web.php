<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'Ruta de prueba funcionando correctamente.';
});

Route::get('/events/{slug}', function ($slug) {
    $training = \App\Models\Training::where('slug', $slug)->firstOrFail();
    return view('event-show', ['training' => $training]);
})->name('events.show');
Route::get('/about', function () {
    return view('about');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/class', function () {
    return view('class');
});
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'CONTACTO',
        'subtitle' => 'ANTONIOBALLESTE.COM'
    ]);
});

// FIN Rutas Frontend
