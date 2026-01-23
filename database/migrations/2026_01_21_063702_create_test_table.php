<?php

namespace database\migrations;
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
        Schema::create('Activities', function (Blueprint $table) {
            $table -> id();
            $table->string('name')->unique();
            $table->boolean('farBool')->default(0);
            $table->string('farUnit', 10);
            $table->boolean('timeBool')->default(0);
            $table->string('timeUnit', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test');
    }
};
