<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenerateCardColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->boolean('generate_card')->default(true);
            $table->string('card', 255)->nullable()->default(null);
            $table->string('card_token', 9)
                ->nullable()
                ->default(null)
                ->unique()
                ->index('card_token_search_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('generate_card');
            $table->dropColumn('card');
            $table->dropColumn('card_token');
        });
    }
}
