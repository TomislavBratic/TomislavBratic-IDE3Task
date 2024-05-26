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
        Schema::table('users', function (Blueprint $table) {
            $table->string('identification_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('street')->nullable();
            $table->string('home_number')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('identification_number');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('phone_number');
            $table->dropColumn('postal_code');
            $table->dropColumn('street');
            $table->dropColumn('home_number');
            $table->dropColumn('city');
            $table->dropColumn('country');
            
        });
    }
};
