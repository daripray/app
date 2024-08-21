<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () { return view('welcome');
})->name('welcome');

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/fe/about', \App\Livewire\About::class)->name('about');
Route::get('/fe/contact', \App\Livewire\Contact::class)->name('contact');
Route::get('/fe/counter', \App\Livewire\Counter::class)->name('counter');

Route::get('/cashflow', \App\Livewire\Cashflow::class)->name('cashflow');
Route::get('/production', \App\Livewire\Production::class)->name('production');

Route::get('/users', \App\Livewire\Users\Index::class)->name('users.index');
Route::get('/users/{user}', \App\Livewire\Users\Show::class)->name('users.show');

// Main
Route::get('/fe/items', \App\Livewire\Items\Index::class)->name('items.index');
Route::get('/fe/outlets', \App\Livewire\Outlets\Index::class)->name('outlets.index');
Route::get('/fe/prices', \App\Livewire\Prices\Index::class)->name('prices.index');
Route::get('/fe/sales', \App\Livewire\Sales\Index::class)->name('sales.index');

Route::get('/fe/features', \App\Livewire\Features\Show::class)->name('features.show');

