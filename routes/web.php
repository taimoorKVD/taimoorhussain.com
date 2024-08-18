<?php

use App\Http\Controllers\Website\PageController;
use App\Http\Middleware\LogVisitor;
use Illuminate\Support\Facades\Route;

Route::get('/', PageController::class)->middleware(LogVisitor::class);
