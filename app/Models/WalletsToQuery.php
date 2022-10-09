<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class WalletsToQuery extends Model
{
    use HasFactory;
    protected $table = 'wallets_to_query';
    protected $fillable = [
        'address',
        'nickname'
    ];

    public function blockchains()
    {
        return $this->belongsToMany(SupportedBlockchains::class, 'blockchains_wallets_pivot', 'wallets_to_query_id', 'supported_blockchains_id')->withTimestamps();
    }

    public function getTokensAttribute()
    {
        $blockchains = $this->blockchains()->get();
        $tokensResult = [];

        foreach ($blockchains as $blockchain) {
            $request = Http::get($blockchain->api_get_token_list . $this->address);
            $blockchainQuery = SupportedBlockchains::where('id', $blockchain->id);

//            if ($request->ok() || request()->json()->status == 1) {
//                $blockchainQuery->update(['error'=>'false']);
//            }
//            else {
//                $blockchainQuery->update(['error'=>'true']);
//            }

            $tokensResult[] = [
                'blockchainId' => $blockchain->id,
                'blockchainName' => $blockchain->name,
                'tokenList' => $request->json()
            ];
        }

        return $tokensResult;
    }
}
