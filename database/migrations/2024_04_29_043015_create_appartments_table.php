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
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('flats_id');
            $table->integer('tenants_id')->nullable();
            $table->integer('categories_id');
            $table->string('amount');
            $table->string('number_of_bathrooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartments');
    }
};
