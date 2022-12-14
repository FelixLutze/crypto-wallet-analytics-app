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
        Schema::create('supported_blockchains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_get_token_list');
            $table->string('tokens_to_ignore')->nullable();
            $table->enum('error', ['true', 'false'])->default('false');
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
        Schema::dropIfExists('supported_blockchains');
    }
};
