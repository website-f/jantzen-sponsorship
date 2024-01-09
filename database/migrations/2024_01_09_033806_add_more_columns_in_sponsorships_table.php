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
          $table->enum('stat', ['none', 'proofSent', 'proofApproved', 'proofRejected', 'afterSent', 'afterApproved', 'afterRejected'])->default('none');
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
