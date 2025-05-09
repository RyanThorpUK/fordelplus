<?php

// use App\Livewire\Settings\Appearance;
// use App\Livewire\Settings\Password;
// use App\Livewire\Settings\Profile;


use App\Livewire\Home;
use App\Livewire\AllOffers;
use App\Livewire\Offer;
use App\Livewire\Company;
use App\Livewire\Companies;
use App\Livewire\Profile;

use App\Livewire\Admin\AdminOffer;
use App\Livewire\Admin\AdminAllOffers;
use App\Livewire\Admin\AdminUsers;
use App\Livewire\Admin\AdminBusinessInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', Home::class)->name('home');
    Route::get('/alle-tilbud/{offer_ulid}', Offer::class)->name('offer.show');
    Route::get('/company/{company_ulid}', Company::class)->name('company');
    Route::get('/firmaer', Companies::class)->name('companies');
    Route::get('/min-side', Profile::class)->name('profile');
    
    Route::middleware(['role:manager|admin'])->group(function () {
        Route::redirect('admin', 'admin/alle-tilbud');
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/alle-tilbud', AdminAllOffers::class)->name('admin.all-offers');
            // Route::get('/alle-tilbud/{offer}', AdminOffer::class)->name('admin.offer');
            Route::get('brugere/{type?}', AdminUsers::class)->name('admin.users');
            Route::get('business-info', AdminBusinessInfo::class)->name('admin.business-info');
        });
    });
    
});

// Email Verification Routes
Route::middleware(['auth'])->group(function () {

    // Show verification notice
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    // Handle verification link
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            dd('asdsd');
        $request->fulfill();

        return redirect()->route('company', ['company' => request()->user()->company_id]);
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';
    

// Test email endpoint
// Route::get('/test-mail', function () {
//     $mailable = (new \App\Mail\InvitationEmail(
//         \App\Models\Invitation::find(1),
//         \App\Models\Company::find(1)
//     ));

//     Mail::to('ryan@ryanthorp.co.uk')->send($mailable);
// });

