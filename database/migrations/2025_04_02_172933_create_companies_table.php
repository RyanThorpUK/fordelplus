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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('type')->default('b2c')->nullable();
            $table->text('description')->nullable();
            $table->string('cvr_number')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
