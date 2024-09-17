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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->string('citizen_nic')->nullable();
            $table->string('party_no')->nullable();
            $table->string('candidate_no1')->nullable();
            $table->string('candidate_no2')->nullable();
            $table->string('candidate_no3')->nullable();
            $table->string('gsProvince')->nullable();
            $table->string('gsDistrict')->nullable();
            $table->string('gsDivition')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
