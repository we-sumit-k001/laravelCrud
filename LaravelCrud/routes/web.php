<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/event/create', function () {
    return view('pages.event');
});*/




Route::get('/event/create', [EventController::class, 'index'])->name('event.create');

Route::post('/events',[EventController::class, 'store'])->name('events.store');

Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');

Route::delete('/event/destroy/{id}', [EventController::class, 'delete'])->name('events.destroy');

Route::delete('/events/delete', [EventController::class, 'multipleDelete'])->name('events.permanentDelete');

Route::delete('events/trash', [EventController::class, 'trash'])->name('events.softDelete');

Route::put('/events/multiple/update', [EventController::class, 'changeStatus'])->name('events.multiple.update');

Route::get('/events/restore', [EventController::class, 'restore'])->name('events.restore');















Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');

Route::get('/organization/create', [OrganizationController::class, 'index'])->name('organization.index');

Route::post('/organizations', [OrganizationController::class, 'store'])->name('organizations.store');

Route::put('/organizations/{id}',[OrganizationController::class, 'update'])->name('organizations.update');

Route::delete('/organizations/{id}', [OrganizationController::class, 'delete'])->name('organizations.destroy');













Route::fallback(function (){

    return view('pages.404found');

});


