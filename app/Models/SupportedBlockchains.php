<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportedBlockchains extends Model
{
    use HasFactory;
    protected $table = "supported_blockchains";
    protected $fillable = [
        'name',
        'api_url'
    ];

    public function wallets()
    {
//        return $this->belongsToMany(WalletsToQuery::class, 'blockchains_wallets_pivot', 'supported_blockchains_id', 'wallets_to_query_id')->withTimestamps();
        return $this->belongsToMany(WalletsToQuery::class, 'blockchains_wallets_pivot', 'supported_blockchains_id', 'wallets_to_query_id');
    }
}
