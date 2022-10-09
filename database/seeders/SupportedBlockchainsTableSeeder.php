<?php

namespace Database\Seeders;

use App\Models\SupportedBlockchains;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportedBlockchainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        SupportedBlockchains::insert([
            [
                "name" => "Celo",
                "api_get_token_list" => "https://explorer.celo.org/api?module=account&action=tokenlist&address=",
                "created_at" => $now,
                "updated_at" => $now
        ]
        ]);
    }
}
