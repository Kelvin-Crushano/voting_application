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
        Schema::create('gs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('password');
            $table->string('description');
            $table->string('gsDivition');
            $table->string('image');
            $table->unsignedBigInteger('workingProvince')->nullable(); // Make it nullable
            $table->unsignedBigInteger('workingDistrict')->nullable(); // Make it nullable
            $table->unsignedBigInteger('workingDivition')->nullable(); // Make it nullable

            $table->foreign('workingProvince')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('workingDistrict')->references('id')->on('districs')->onDelete('cascade');
            $table->foreign('workingDivition')->references('id')->on('divitions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gs');
    }
};
