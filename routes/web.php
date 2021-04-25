<?php

use App\Http\Controllers\Api\V1\ImageController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Jetstream\Jetstream;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});


Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
        Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
        Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
    }

    Route::group(['middleware' => ['auth', 'verified']], function () {
        // User & Profile...
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resources([
            'rapport' => \App\Http\Controllers\ReportController::class,
            'customers' => \App\Http\Controllers\CustomersController::class
        ]);
        Route::get('rapport/download/pdf/{id?}',[\App\Http\Controllers\ReportController::class, 'generatPdf'] );
        Route::get('rapport/{id?}/view',[\App\Http\Controllers\ReportController::class, 'show'] );
        Route::middleware(['permission:admin.settings.view'])->group(function () {

        });
           Route::get('/files', function () {
               return view('library');
            })->name('files');

        /**
         * Items
         */
        Route::get('/items',  App\Http\Livewire\Item\Table::class)->name('items');
        Route::get('/items/item/{id?}',  App\Http\Livewire\Item\Item::class)->name('items.item');

        Route::post('/file/uplaud', [\App\Http\Controllers\Api\V1\ImageController::class, 'upload'])->name('file.upload');

        Route::get('/user/profile', [UserProfileController::class, 'show'])
            ->name('profile.show');

        // API...
        if (Jetstream::hasApiFeatures()) {
            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        }

    });
});
