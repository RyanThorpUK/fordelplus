<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Company;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        // Get all companies
        // $companies = Company::all();

        // foreach ($companies as $company) {
        //     // Create 5 active discount code offers
        //     Offer::factory()
        //         ->discountCode()
        //         ->count(5)
        //         ->create([
        //             'company_id' => $company->id
        //         ]);

        //     // Create 3 active contact form offers
        //     Offer::factory()
        //         ->contactForm()
        //         ->count(3)
        //         ->create([
        //             'company_id' => $company->id
        //         ]);

        //     // Create 2 expired offers
        //     Offer::factory()
        //         ->expired()
        //         ->count(2)
        //         ->create([
        //             'company_id' => $company->id
        //         ]);

        //     // Create 2 future offers
        //     Offer::factory()
        //         ->future()
        //         ->count(2)
        //         ->create([
        //             'company_id' => $company->id
        //         ]);
        // }

        // // Create some specific offers for testing
        // Offer::factory()->create([
        //     'name' => '50% Off Spring Sale',
        //     'offer_code' => 'SPRING50',
        //     'company_id' => $companies->first()->id,
        //     'type' => 'discount-code',
        //     'start_date' => now(),
        //     'end_date' => now()->addMonths(1),
        // ]);

        // Offer::factory()->create([
        //     'name' => 'Free Consultation',
        //     'company_id' => $companies->first()->id,
        //     'type' => 'contact-form',
        //     'start_date' => now(),
        //     'end_date' => now()->addMonths(3),
        // ]);
    }
} 