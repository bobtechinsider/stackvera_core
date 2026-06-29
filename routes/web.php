<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // TODO: restrict to an admin role/policy once roles are introduced.
    Route::livewire('contact-enquiries', 'pages::contact-enquiries.index')->name('contactEnquiries.index');
});

require __DIR__.'/settings.php';
