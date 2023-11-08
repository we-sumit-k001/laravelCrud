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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('organization_id');
            $table->text('description');
            $table->string('event_type');
            $table->string('topics');
            $table->string('notes');
            $table->string('has_proposed_date');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('is_accepted_speaker_application');
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
