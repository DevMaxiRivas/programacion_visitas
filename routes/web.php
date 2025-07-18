<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return view('welcome');
    return redirect('/panel');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('visitas/archivos/{codigo_cliente}/{nombre_archivo}', [\App\Http\Controllers\VisitaController::class, 'listaArchivos'])
    //     ->name('visitas.archivos');
    Route::get('visita/{visita}/imagen/{indice}', [\App\Http\Controllers\VisitaController::class, 'obtener_imagenes'])
        ->name('visita.imagen');
    Route::get('visita/{visita}/archivo/{indice}', [\App\Http\Controllers\VisitaController::class, 'obtener_archivos'])
        ->name('visita.archivo');
});

require __DIR__.'/auth.php';
