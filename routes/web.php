<?php

use App\Http\Controllers\WalletController;

Route::get('/', [WalletController::class, 'index'])->name('home');
Route::get('/apple-wallet', [WalletController::class, 'appleWallet'])->name('apple.wallet');
Route::get('/google-wallet', [WalletController::class, 'googleWallet'])->name('google.wallet');
