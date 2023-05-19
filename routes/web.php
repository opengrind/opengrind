<?php

use App\Domains\Auth\Web\Controllers\ApplicationController;
use App\Domains\Home\Web\Controllers\HomeController;
use App\Domains\Search\Web\Controllers\SearchController;
use App\Domains\Settings\ManageCompany\Web\Controllers\CreateCompanyController;
use App\Domains\Settings\ManageCompany\Web\Controllers\WelcomeController;
use App\Domains\Settings\ManageLocale\Web\Controllers\LocaleController;
use App\Domains\Settings\ManageOffices\Web\Controllers\SettingsOfficeController;
use App\Domains\Settings\ManageRoles\Web\Controllers\SettingsRoleController;
use App\Domains\Settings\ManageSettings\Web\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ApplicationController::class, 'index'])->name('application.index');

Route::get('verify-email', [ApplicationController::class, 'index'])->name('application.index');

Route::get('locale/{locale}', [LocaleController::class, 'update'])->name('locale.update');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome.index');
    Route::get('create-company', [CreateCompanyController::class, 'index'])->name('create_company.index');
    Route::post('create-company', [CreateCompanyController::class, 'store'])->name('create_company.store');

    Route::middleware(['company'])->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home.index');

        // search
        Route::post('search', [SearchController::class, 'show'])->name('search.show');

        // settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/roles', [SettingsRoleController::class, 'index'])->name('settings.roles.index');
        Route::get('settings/offices', [SettingsOfficeController::class, 'index'])->name('settings.offices.index');
    });
});

require __DIR__.'/auth.php';
