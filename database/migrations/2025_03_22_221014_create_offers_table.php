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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable(); // Image URL
            $table->string('name'); // Name
            $table->string('slug')->unique(); // SEO-friendly slug
       
            $table->date('start_date'); // Start date
            $table->date('end_date'); // End date
            $table->string('type'); // Type
            
            $table->string('offer_code')->unique(); // Unique code
            $table->string('offer_link'); // Offer link
            $table->text('description')->nullable(); // Description
            $table->integer('quantity')->default(0); // Quantity available
            $table->timestamps();

            // $table->foreignId('company_id')->cascadeOnDelete();
            // $table->foreignId('category_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
