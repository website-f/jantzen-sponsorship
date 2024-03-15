<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sponsorships', function (Blueprint $table) {
            $table->json('tiktok_proof')->nullable();
            $table->json('tiktok_after_event')->nullable();
            $table->json('xhs_proof')->nullable();
            $table->json('xhs_after_event')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsorships', function (Blueprint $table) {
            $table->dropColumn('tiktok_proof');
            $table->dropColumn('tiktok_after_event');
            $table->dropColumn('xhs_proof');
            $table->dropColumn('xhs_after_event');
        });
    }
};
