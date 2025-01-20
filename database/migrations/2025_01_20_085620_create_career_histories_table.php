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
        Schema::create('career_histories', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('jobseeker_id')->unique();
        $table->string('job_title');
        $table->date('start_date');
        $table->date('end_date')->nullable();
        $table->text('description')->nullable();
        $table->boolean('still_in_role')->default(false);
        $table->timestamps();

        $table->foreign('jobseeker_id')->references('id')->on('jobseekers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_histories');
    }
};