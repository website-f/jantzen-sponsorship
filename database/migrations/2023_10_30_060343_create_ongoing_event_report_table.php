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
        Schema::create('ongoing_event_reports', function (Blueprint $table) {
            $table->id();
            $table->string('cash_in_report', 255)->nullable();
            $table->json('cash_out_report')->nullable();
            $table->string('total_cash_out')->nullable();
            $table->string('total_cash_out_num')->nullable();
            $table->json('stock_on_hand')->nullable();
            $table->string('total_sale')->nullable();
            $table->string('total_sale_num')->nullable();
            $table->string('cash_on_hand')->nullable();
            $table->string('tng')->nullable();
            $table->string('others')->nullable();
            $table->string('day')->nullable();
            $table->unsignedBigInteger('sponsorship_id')->nullable();
            $table->foreign('sponsorship_id')->references('id')->on('sponsorships')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongoing_event_reports');
    }
};
