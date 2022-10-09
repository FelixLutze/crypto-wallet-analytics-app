<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletsToQuery extends Model
{
    use HasFactory;
    protected $table = 'wallets_to_query';
    public $incrementing = false;
    protected $fillable = [
        'address',
        'nickname'
    ];

    public function blockchains() {
        return $this->belongsToMany(SupportedBlockchains::class, 'blockchains_wallets_pivot', 'wallets_to_query_id', 'supported_blockchains_id')->withTimestamps();
    }
}
