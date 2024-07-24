<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\TestimonialController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// contact form
Route::post('/contactForm', [ContactUsController::class, 'save'])->name('contact.store');
// Admin Routes
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about-us/edit', [AboutUsController::class, 'edit'])->name('about.edit');
    Route::post('/about-us/{id}', [AboutUsController::class, 'save'])->name('about.update');

    Route::prefix('why-us')->name('why-us.')->controller(WhyUsController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('form/{whyUs?}', 'CreateOrEdit')->name('form');
        Route::post('form/{whyUs?}', 'save')->name('store');
        Route::get('delete/{whyUs}', 'destroy')->name('delete');
    });

    Route::prefix('services')->name('services.')->controller(ServicesController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('form/{service?}', 'CreateOrEdit')->name('form');
        Route::post('form/{service?}', 'save')->name('store');
        Route::get('delete/{service}', 'destroy')->name('delete');
    });

    Route::prefix('testimonials')->name('testimonials.')->controller(TestimonialController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('form/{testimonial?}', 'CreateOrEdit')->name('form');
        Route::post('form/{testimonial?}', 'save')->name('store');
        Route::get('delete/{testimonial}', 'destroy')->name('delete');
    });

    Route::prefix('team')->name('team.')->controller(TeamsController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('form/{team?}', 'CreateOrEdit')->name('form');
        Route::post('form/{team?}', 'save')->name('store');
        Route::get('delete/{team}', 'destroy')->name('delete');
    });

    Route::prefix('clients')->name('clients.')->controller(ClientsController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('form/{client?}', 'CreateOrEdit')->name('form');
        Route::post('form/{client?}', 'save')->name('store');
        Route::get('delete/{client}', 'destroy')->name('delete');
    });

    Route::prefix('contact-us')->name('contact-us.')->controller(ContactUsController::class)->group(function () {
        Route::get('list', 'index')->name('list');
        Route::get('view/{contact}', 'view')->name('view');
        Route::get('delete/{contact}', 'destroy')->name('delete');
    });
});
require __DIR__ . '/auth.php';
