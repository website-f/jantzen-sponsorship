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
            $table->string('confirmro_200ml')->nullable();
            $table->string('confirmro_500ml')->nullable();
            $table->string('confirmro_11L')->nullable();
            $table->string('confirmro_350ml')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsorships', function (Blueprint $table) {
            //
        });
    }
};
