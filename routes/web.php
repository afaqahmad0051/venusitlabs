<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // We will have just one entry in about-us table and we will keep updating that one. Create a seeder for that one entry
    //columns of this table will be: title(string), description(long_text),
    // Route::get('/about-us/{id}', [AboutUsController::class, 'update'])->name('about.update');

    //Services
    //columns of this table will be: title(string), description(long_text), logo/image(string)
    // Route::prefix('services')->name('services.')->controller(ServicesController::class)->group(function () {
    //     Route::get('list', 'index')->name('list');
    //     Route::get('form', 'create')->name('create');
    //     Route::post('form', 'store')->name('store');
    //     Route::get('form/{id}', 'edit')->name('edit');
    //     Route::post('form/{id}', 'update')->name('update');
    //     Route::get('delete/{uuid}', 'destroy')->name('delete');
    // });

    //Testimonials
    //columns of this table will be: name(string), qualification(string), short_info(text), image(string)
    // Route::prefix('services')->name('services.')->controller(ServicesController::class)->group(function () {
    //     Route::get('list', 'index')->name('list');
    //     Route::get('form', 'create')->name('create');
    //     Route::post('form', 'store')->name('store');
    //     Route::get('form/{id}', 'edit')->name('edit');
    //     Route::post('form/{id}', 'update')->name('update');
    //     Route::get('delete/{uuid}', 'destroy')->name('delete');
    // });

    //Team
    //columns of this table will be: name(string), designation(string), short_info(text), image(string)
    //remove social links on team page
    // Route::prefix('services')->name('services.')->controller(ServicesController::class)->group(function () {
    //     Route::get('list', 'index')->name('list');
    //     Route::get('form', 'create')->name('create');
    //     Route::post('form', 'store')->name('store');
    //     Route::get('form/{id}', 'edit')->name('edit');
    //     Route::post('form/{id}', 'update')->name('update');
    //     Route::get('delete/{uuid}', 'destroy')->name('delete');
    // });

    //Clients
    //columns of this table will be: name(string), image(string)
    //remove social links on team page
    // Route::prefix('services')->name('services.')->controller(ServicesController::class)->group(function () {
    //     Route::get('list', 'index')->name('list');
    //     Route::get('form', 'create')->name('create');
    //     Route::post('form', 'store')->name('store');
    //     Route::get('form/{id}', 'edit')->name('edit');
    //     Route::post('form/{id}', 'update')->name('update');
    //     Route::get('delete/{uuid}', 'destroy')->name('delete');
    // });

    //Contact-us
    //columns of this table will be: user_name(string), user_email(string), subject(string), message(text), company_address(string), company_phone(string), company_email(string)
    //The visitor will fill the contact us form and submit it, We will store in database and show on the admin panel.
    // Route::prefix('services')->name('services.')->controller(ContactUsController::class)->group(function () {
    //     Route::get('list', 'index')->name('list');
    //     Route::get('view/{id}', 'view')->name('view');
    //     Route::get('delete/{uuid}', 'destroy')->name('delete');
    // });

});
require __DIR__.'/auth.php';
