<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\OfferCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);
        $types = ['discount-code', 'contact-form'];
        $userTypes = ['b2b', 'b2c'];

        // Generate a fake image file
        $imagePath = 'offer-images/dummy-' . Str::random(10) . '.jpg';
        if (!Storage::disk('public')->exists($imagePath)) {
            // Use picsum.photos for random images
            $imageUrl = 'https://picsum.photos/600/400';
            Storage::disk('public')->put($imagePath, file_get_contents($imageUrl));
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $imagePath,
            'start_date' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'offer_type' => $this->faker->randomElement($types),
            'user_type' => $this->faker->randomElement($userTypes),
            'offer_code' => strtoupper($this->faker->unique()->bothify('????##')),
            'offer_link' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'quantity' => $this->faker->numberBetween(10, 1000),
            'company_id' => Company::factory(),
            'category_id' => OfferCategory::where('parent_id', '!=', null)->get()->random()->id,
        ];
    }

    public function discountCode()
    {
        return $this->state(function (array $attributes) {
            return [
                'offer_type' => 'discount-code',
            ];
        });
    }

    public function contactForm()
    {
        return $this->state(function (array $attributes) {
            return [
                'offer_type' => 'contact-form',
            ];
        });
    }

    public function expired()
    {
        return $this->state(function (array $attributes) {
            return [
                'start_date' => now()->subMonths(2),
                'end_date' => now()->subMonth(),
            ];
        });
    }

    public function future()
    {
        return $this->state(function (array $attributes) {
            return [
                'start_date' => now()->addMonth(),
                'end_date' => now()->addMonths(2),
            ];
        });
    }
} 