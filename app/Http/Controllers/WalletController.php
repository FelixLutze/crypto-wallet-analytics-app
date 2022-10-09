<?php

namespace App\Http\Controllers;

use App\Models\SupportedBlockchains;
use App\Models\WalletsToQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    public function getWallets ()
    {
        $allWallets = WalletsToQuery::with('blockchains')->get();
        return $allWallets;
    }

    public function getWalletTokens ($walletId)
    {
        $walletTokens = WalletsToQuery::where('address', $walletId)->first()->append('tokens');

        if (!$walletTokens) {
            return response(['message' => $walletId . ' not added.'], 400);
        }

        return response([$walletTokens], 200);
    }
}
