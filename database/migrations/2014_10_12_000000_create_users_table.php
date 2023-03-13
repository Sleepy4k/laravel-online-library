<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $genders = config()->get('gender.list');

        Schema::create('users', function (Blueprint $table) use ($genders) {
            $table->id();
            $table->string('name');
            $table->bigInteger('age');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender',  $genders);
            $table->text('address');
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
