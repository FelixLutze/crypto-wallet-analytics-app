<?php

use App\Http\Controllers\walletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('wallet')->group(function () {
    Route::get('list', [WalletController::class, 'getWallets']);
    Route::get('{walletId}/tokens', [WalletController::class, 'getWalletTokens']);
});
