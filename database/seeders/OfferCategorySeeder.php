<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\OfferCategory;

class OfferCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Oplevelser & Fritid',
                'children' => [
                    'Rejser',
                    'Sport & Bevægelse',
                    'Turisme',
                    'Begivenheder',
                    'Wellness',
                    'Kultur & Underholdning',
                    'Hobby & Fritidsaktiviteter'
                ]
            ],
            [
                'name' => 'Mad & Drikke',
                'children' => [
                    'Takeaway',
                    'Restauranter & Caféer',
                    'Dagligvarer',
                    'Specialbutikker',
                    'Catering'
                ]
            ],
            [
                'name' => 'Detailhandel',
                'children' => [
                    'Tøj & Mode',
                    'Bolig & Have',
                    'Biler',
                    'Elektronik & Gadgets',
                    'Børn & Baby',
                    'Smykker & Accessories'
                ]
            ],
            [
                'name' => 'Service',
                'children' => [
                    'Håndværk',
                    'Reparation',
                    'IT',
                    'Rådgivning',
                    'Uddannelse',
                    'Markedsføring & Design',
                    'Økonomi & Jura'
                ]
            ],
            [
                'name' => 'Sundhed',
                'children' => [
                    'Træning & Fitness',
                    'Helse',
                    'Alternativ behandling',
                    'Læger & Behandling',
                    'Psykologi & Coaching',
                    'Skønhed & Pleje'
                ]
            ]
        ];

        foreach ($categories as $category) {
            // Create parent category
            $parent = OfferCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'parent_id' => null
            ]);

            // Create children categories
            foreach ($category['children'] as $childName) {
                OfferCategory::create([
                    'name' => $childName,
                    'slug' => Str::slug($childName),
                    'parent_id' => $parent->id
                ]);
            }
        }
    }
} 