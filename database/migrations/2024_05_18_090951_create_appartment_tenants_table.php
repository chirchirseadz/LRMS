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
        Schema::create('appartment_tenants', function (Blueprint $table) {
            $table->id();
            $table->integer('tenants_id');
            $table->integer('appartments_id');
            $table->integer('previous_tenant_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartment_tenants');
    }
};
