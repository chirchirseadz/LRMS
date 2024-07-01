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
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->string('hospitalNumber');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('idNo');
            $table->string('residence');
            $table->string('phoneNumber');
            $table->string('gender');
            $table->string('action_by');
            $table->string('level');
            $table->timestamps();
        });
    }  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bio_data');
    }
};
