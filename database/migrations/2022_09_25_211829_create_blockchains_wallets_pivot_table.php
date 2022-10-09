<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockchains_wallets_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supported_blockchains_id');
            $table->foreign('supported_blockchains_id')->references('id')->on('supported_blockchains');
            $table->unsignedBigInteger('wallets_to_query_id');
            $table->foreign('wallets_to_query_id')->references('id')->on('wallets_to_query');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blockchains_wallets_pivot');
    }
};
