<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('qualification');
            $table->string('specialization');
            $table->text('experience');
            $table->string('contact');
            $table->string('email');
            $table->text('address');
            $table->json('certification')->nullable();
            $table->enum('current_status', ['own_business', 'employee', 'other']);
            $table->string('cv_path')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])
                ->default('pending');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
