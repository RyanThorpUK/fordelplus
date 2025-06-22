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
        Schema::create('company_blacklist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('blacklisted_company_id')->constrained('companies')->onDelete('cascade');
            $table->timestamps();
            
            // Prevent duplicate entries
            $table->unique(['company_id', 'blacklisted_company_id']);
            
            // Add indexes for better performance
            $table->index('company_id');
            $table->index('blacklisted_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_blacklist');
    }
};
