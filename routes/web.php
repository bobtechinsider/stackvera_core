<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('home');

Route::get('sitemap.xml', function () {
    return response()
        ->view('sitemap', ['url' => route('home')])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::view('imprint', 'pages.legal.imprint')->name('legal.imprint');
Route::view('privacy-policy', 'pages.legal.privacy')->name('legal.privacy');

Route::get('locale/{locale}', function (string $locale) {
    abort_unless(in_array($locale, SetLocale::SUPPORTED_LOCALES, true), 404);

    return redirect()
        ->back()
        ->withCookie(cookie()->forever('locale', $locale));
})->name('locale.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // TODO: restrict to an admin role/policy once roles are introduced.
    Route::livewire('contact-enquiries', 'pages::contact-enquiries.index')->name('contactEnquiries.index');
});

require __DIR__.'/settings.php';
