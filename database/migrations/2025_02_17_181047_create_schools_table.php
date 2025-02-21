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

        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->required();
            $table->string('direction')->nullable();
        });

        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->required();
            $table->string('phone')->min(9)->max(9)->required()->unique();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
        });

        

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->required();
        });

        Schema::create('scholar_course', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('scholar_id')->constrained('scholars')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars');
        Schema::dropIfExists('schools');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('scholar_course');
    }
};
