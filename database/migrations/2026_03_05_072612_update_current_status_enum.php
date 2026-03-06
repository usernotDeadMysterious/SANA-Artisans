<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE artists 
            MODIFY current_status ENUM(
                'student',
                'own_business',
                'employee',
                'unemployed',
                'other'
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE artists 
            MODIFY current_status ENUM(
                'own_business',
                'employee',
                'other'
            )
        ");
    }
};