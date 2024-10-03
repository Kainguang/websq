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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_name_th');
            $table->float('course_cost');
            $table->float('course_sellprice');
            $table->string('course_status',1);
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('period');
            $table->integer('times');
            $table->integer('max_participant');
            $table->string('description');
            $table->string('picture_path')->nullable();
            $table->foreignId('employee_id')->constrained('employees');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
