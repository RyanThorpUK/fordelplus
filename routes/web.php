<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\AllOffers;
use App\Livewire\Users;
use App\Livewire\BusinessInfo;
use App\Livewire\Business;
use App\Livewire\Marketplace;
use App\Livewire\Home;
use App\Livewire\Article;
use App\Livewire\MarketplaceBusinessArchive;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', Home::class)->name('home');
Route::get('marketplace', Marketplace::class)->name('marketplace');
Route::get('marketplace/{article}', Article::class)->name('marketplace.article');
Route::get('business', Business::class)->name('business');
Route::get('marketplace-business-archive', MarketplaceBusinessArchive::class)->name('marketplace.business.archive');

Route::middleware(['auth'])->group(function () {

    Route::get('all-offers', AllOffers::class)->name('all-offers');
    Route::get('users', Users::class)->name('users');
    Route::get('business-info', BusinessInfo::class)->name('business-info');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
