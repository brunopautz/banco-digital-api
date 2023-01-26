<?php

use App\Http\Controllers\Api\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/account', [AccountController::class , 'login'])->name('account.login');
Route::get('/account/{account}', [AccountController::class , 'account'])->name('account.account');
Route::post('/account/{account}/deposit', [AccountController::class , 'deposit'])->name('account.deposit');
Route::post('/account/{account}/saque', [AccountController::class , 'saque'])->name('account.saque');
