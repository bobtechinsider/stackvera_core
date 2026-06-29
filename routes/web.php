<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('home');

Route::view('imprint', 'pages.legal.imprint')->name('legal.imprint');
Route::view('privacy-policy', 'pages.legal.privacy')->name('legal.privacy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // TODO: restrict to an admin role/policy once roles are introduced.
    Route::livewire('contact-enquiries', 'pages::contact-enquiries.index')->name('contactEnquiries.index');
});

require __DIR__.'/settings.php';
