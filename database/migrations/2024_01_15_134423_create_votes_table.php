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
            $table->unsignedBigInteger('citizen_nic')->nullable();
            $table->unsignedBigInteger('party_no1')->nullable();
            $table->unsignedBigInteger('candidate_no1')->nullable();
            $table->unsignedBigInteger('party_no2')->nullable();
            $table->unsignedBigInteger('candidate_no2')->nullable();
            $table->unsignedBigInteger('party_no3')->nullable();
            $table->unsignedBigInteger('candidate_no3')->nullable();
            $table->unsignedBigInteger('gsProvince')->nullable();
            $table->unsignedBigInteger('gsDistrict')->nullable();
            $table->unsignedBigInteger('gsDivition')->nullable();

            $table->foreign('citizen_nic')->references('id')->on('citizenships')->onDelete('cascade');
            $table->foreign('party_no1')->references('id')->on('parties')->onDelete('cascade');
            $table->foreign('candidate_no1')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('party_no2')->references('id')->on('parties')->onDelete('cascade');
            $table->foreign('candidate_no2')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('party_no3')->references('id')->on('parties')->onDelete('cascade');
            $table->foreign('candidate_no3')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('gsProvince')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('gsDistrict')->references('id')->on('districs')->onDelete('cascade');
            $table->foreign('gsDivition')->references('id')->on('divitions')->onDelete('cascade');

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
