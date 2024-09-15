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
        Schema::create('course_course_bills', function (Blueprint $table) {
            $table->id();
            $table->string('course_status');
            $table->float('price');
            $table->float('discount');
            $table->integer('amount');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');;
            $table->foreignId('course_bilss_id')->constrained('course_bills')->onDelete('cascade');;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_course_bills');
    }
};
