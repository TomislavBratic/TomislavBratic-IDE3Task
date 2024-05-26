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
        Schema::create('groceries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 9, 3);
            $table->string('type');
            $table->string('unit_symbol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groceries');
    }
};
