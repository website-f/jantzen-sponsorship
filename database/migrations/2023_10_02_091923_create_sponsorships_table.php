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
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('organization')->nullable();
            $table->string('about_jantzen')->nullable();
            $table->string('event_name')->nullable();
            $table->string('nature_event')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('eventAddress')->nullable();
            $table->string('attendees')->nullable();
            $table->string('explaination_product')->nullable();
            $table->string('booth')->nullable();
            $table->text('summary')->nullable();
            $table->json('sponsorship_attachments')->nullable();
            $table->string('ro_200ml')->nullable();
            $table->string('ro_500ml')->nullable();
            $table->string('ro_1p5L')->nullable();
            $table->string('ro_11L')->nullable();
            $table->string('ro_350ml')->nullable();
            $table->string('paper_cup')->nullable();
            $table->string('goodies_bag')->nullable();
            $table->text('others')->nullable();
            $table->json('attachements_agreement_proof_review')->nullable();
            $table->json('attachements_agreement_proof_photo')->nullable();
            $table->json('attachements_agreement_proof_video')->nullable();
            $table->date('collection_date')->nullable();
            $table->string('collection_time_slot')->nullable();
            $table->string('collector_name')->nullable();
            $table->string('collector_IC')->nullable();
            $table->string('collector_contact')->nullable();
            $table->string('collector_plate_number')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('pickup_phone_number')->nullable();
            $table->json('after_events_attachments_review')->nullable();
            $table->json('after_events_attachments_photo')->nullable();
            $table->json('after_events_attachments_video')->nullable();
            // $table->enum('status', ['none','submit', 'approval', 'proof', 'collect', 'collected', 'complete', 'blacklist', 'reject'])->default('none');
            $table->enum('states', ['Processing', 'Approved', 'Pending', 'Pending Collection', 'Collected', 'MIA', 'Completed', 'Closed', 'Delay', 'Rejected', 'Blacklist'])->default('Processing');
            $table->string('booth_space')->nullable();
            $table->string('remarks')->nullable();
            $table->json('attending')->nullable();
            $table->json('tags')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorships');
    }
};
