<?php

use App\Http\Controllers\Website\{ContactController, PageController};
use App\Http\Middleware\LogVisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', PageController::class)->middleware(LogVisitor::class);
Route::post('new-contact', ContactController::class)->name('contact.store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
