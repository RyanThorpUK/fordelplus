<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    public function definition(): array
    {

        // Generate a fake image file
        $imagePath = 'offer-images/dummy-' . Str::random(10) . '.jpg';
        if (!Storage::disk('public')->exists($imagePath)) {
            // Use picsum.photos for random images
            $imageUrl = 'https://picsum.photos/150/150';
            Storage::disk('public')->put($imagePath, file_get_contents($imageUrl));
        }

        return [
            'name' => $this->faker->company(),
            'logo' => $imagePath,
            'description' => $this->faker->paragraph(),
            'cvr_number' => $this->faker->randomNumber(8),
            'billing_email' => $this->faker->email(),
        ];
    }
} 