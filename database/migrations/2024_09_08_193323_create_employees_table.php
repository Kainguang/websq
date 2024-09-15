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
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->string('phonenum',10);
            $table->string('address');
            $table->date('birthdate');
            $table->float('weight');
            $table->integer('height');
            $table->string('gender');
            $table->string('salary');
            $table->time('workstart');
            $table->time('workend');
            $table->string('profile_picture');
            $table->string('class');
            $table->unsignedInteger('role_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
