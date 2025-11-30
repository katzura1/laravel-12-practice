<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    ds("Hello World");
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        ds("Dashboard");
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/api/user', function () {
    return response()->json(User::all());
});

Route::get('/test', function () {
    echo config('app.name');
    echo "<br>";
    echo env('APP_NAME');
});

require __DIR__ . '/settings.php';
