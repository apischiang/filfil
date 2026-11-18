<?php

use App\Http\Controllers\QuotationTradingPrintController;
use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome')->name('home');
Route::get('/trading/quotation/{quotationTrading}/print', QuotationTradingPrintController::class)
    ->middleware('auth')
    ->name('trading.quotation.print');
Route::get('/q/{publicToken}', [QuotationTradingPrintController::class, 'showPublic'])
    ->name('quotation.public');
