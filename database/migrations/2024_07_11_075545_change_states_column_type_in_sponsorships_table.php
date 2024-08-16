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
            //
            $table->string('states')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsorships', function (Blueprint $table) {
            //
            $table->enum('states', ['Processing', 'Approved', 'Pending', 'Pending Collection', 'Collected', 'MIA', 'Completed', 'Closed', 'Delay', 'Rejected', 'Blacklist'])->default('Processing')->change();
        });
    }
};
