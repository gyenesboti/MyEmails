<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
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

Route::post("/signup", [UserController::class, 'signup']);
Route::post("/login", [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get("/emails/sent/{id}", [MailController::class, 'getSentMails']);
    Route::get("/allMails/{id}", [MailController::class, "allMails"]);
    Route::get("/email/{id}", [MailController::class, "getMailForRead"]);
    Route::delete("/deleteMail/{id}", [MailController::class, "deleteMail"]);
    Route::post("/newEmail/{id}", [MailController::class, 'newEmail']);
    Route::post("/logout", [UserController::class, 'logout']);
});
