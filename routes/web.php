<?php

use App\Domains\Auth\Web\Controllers\ApplicationController;
use App\Domains\Search\Web\Controllers\SearchController;
use App\Domains\Settings\ManageCompany\Web\Controllers\CreateCompanyController;
use App\Domains\Settings\ManageLocale\Web\Controllers\LocaleController;
use App\Domains\Settings\ManageOffices\Web\Controllers\SettingsOfficeController;
use App\Domains\Settings\ManageRoles\Web\Controllers\SettingsRoleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\Settings\ProfileSettingsController;
use App\Http\Controllers\Profile\Settings\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ApplicationController::class, 'index'])->name('application.index');

Route::get('locale/{locale}', [LocaleController::class, 'update'])->name('locale.update');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login.create');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('welcome', [HomeController::class, 'index'])->name('home.index');

    // profile
    Route::get('settings', [ProfileSettingsController::class, 'index'])->name('settings.profile.index');

    // Route::get('create-company', [CreateCompanyController::class, 'index'])->name('create_company.index');
    // Route::post('create-company', [CreateCompanyController::class, 'store'])->name('create_company.store');

    Route::middleware(['company'])->group(function () {
        //Route::get('home', [HomeController::class, 'index'])->name('home.index');

        // search
        // Route::post('search', [SearchController::class, 'show'])->name('search.show');

        // // settings
        // Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        // Route::get('settings/roles', [SettingsRoleController::class, 'index'])->name('settings.roles.index');
        // Route::get('settings/offices', [SettingsOfficeController::class, 'index'])->name('settings.offices.index');
    });
});
