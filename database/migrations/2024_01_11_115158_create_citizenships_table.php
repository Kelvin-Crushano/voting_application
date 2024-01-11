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
        Schema::create('citizenships', function (Blueprint $table) {
            $table->id();
            $table->string('nameWithInitials')->nullable();
            $table->string('fullName')->nullable();
            $table->string('addressInSrilanka')->nullable();
            $table->string('addressInForeign')->nullable();
            $table->string('email')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->integer('birthNo')->nullable();
            $table->string('district')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nicNo')->nullable();
            $table->string('sex')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('nationalityOfSpouse')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('fatherDate_dob')->nullable();
            $table->string('fatherDate_pob')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherDate_dob')->nullable();
            $table->string('motherDate_pob')->nullable();
            $table->string('fatherCertificateNo')->nullable();
            $table->string('fatherDateofIssue')->nullable();
            $table->string('motherCertificateNo')->nullable();
            $table->string('motherDateofIssue')->nullable();
            $table->string('passwordNumber')->nullable();
            $table->string('passwordDateIssue')->nullable();
            $table->string('passwordPlaceIssue')->nullable();
            $table->string('country')->nullable();
            $table->string('dateGranted')->nullable();
            $table->integer('citizenshipNo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizenships');
    }
};
