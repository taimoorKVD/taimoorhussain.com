<?php

use App\Http\Controllers\Website\{ContactController, PageController};
use App\Http\Middleware\LogVisitor;
use Illuminate\Support\Facades\Route;

Route::name('website.')
    ->group(static function () {
        Route::get('/', PageController::class)->middleware(LogVisitor::class);
        Route::post('new-contact', ContactController::class)->name('contact.store');
    });
