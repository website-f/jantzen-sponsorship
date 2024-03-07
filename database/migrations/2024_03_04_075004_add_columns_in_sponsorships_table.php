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
            $table->string('sec_PIC_name')->nullable();
            $table->string('sec_PIC_number')->nullable();
            $table->string('sec_PIC_email')->nullable();
            $table->string('third_PIC_name')->nullable();
            $table->string('third_PIC_number')->nullable();
            $table->string('third_PIC_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsorships', function (Blueprint $table) {
            $table->dropColumn('sec_PIC_name');
            $table->dropColumn('sec_PIC_number');
            $table->dropColumn('sec_PIC_email');
            $table->dropColumn('third_PIC_name');
            $table->dropColumn('third_PIC_number');
            $table->dropColumn('third_PIC_email');
        });
    }
};
