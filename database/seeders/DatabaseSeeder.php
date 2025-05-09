<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Offer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            OfferCategorySeeder::class,
            // OfferSeeder::class,
        ]);

        // Create companies with users and offers
        Company::factory(10)
            ->has(User::factory()->count(3))
            ->has(Offer::factory()->count(5))
            ->create();
        
        // // Or if you want to create them separately
        // $companies = Company::factory(10)->create();
        
        // User::factory(30)
        //     ->recycle($companies) // This will use existing companies instead of creating new ones
        //     ->create();
            
        // Offer::factory(50)
        //     ->recycle($companies)
        //     ->create();
    }
}
