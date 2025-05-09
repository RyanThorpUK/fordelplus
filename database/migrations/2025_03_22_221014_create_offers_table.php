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
            $table->ulid()->unique();
            
            $table->string('image')->nullable(); // Image URL
            $table->string('name'); // Name
            $table->string('slug'); // SEO-friendly slug
       
            $table->date('start_date'); // Start date
            $table->date('end_date'); // End date
            $table->string('user_type'); // Type
            $table->string('offer_type'); // Type
            $table->string('offer_code')->unique()->nullable(); // Unique code
            $table->string('offer_link')->nullable(); // Offer link
            $table->string('offer_email')->nullable(); // Email
            $table->text('description')->nullable(); // Description
            $table->integer('quantity')->nullable();
            $table->json('offer_fields')->nullable(); // Quantity available
            $table->timestamps();

            $table->softDeletes();

            $table->foreignId('company_id')->cascadeOnDelete();
            $table->foreignId('category_id')->cascadeOnDelete();

            $table->unique(['slug', 'company_id']); // Composite unique index
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
