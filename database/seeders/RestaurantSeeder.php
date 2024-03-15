<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Array di dati dei ristoranti con le tipologie desiderate
        $restaurantsData = [
            [
                'user_id' => 1,
                'name' => 'Pizza Italia',
                'slug' => Str::slug('Pizza Italia'),
                'address' => 'Via Garibaldi, 10, Roma',
                'phone' => '+39 06 1234567',
                'vat' => 'IT123456789',
                'description' => 'Pizza tradizionale italiana e altri piatti italiani.',
            ],
            [
                'user_id' => 2,
                'name' => 'Burger Palace',
                'slug' => Str::slug('Burger Palace'),
                'address' => '123 Main Street, New York',
                'phone' => '+1 212-555-1234',
                'vat' => 'US987654321',
                'description' => 'Hamburger succulenti e patatine croccanti.',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Sake',
                'slug' => Str::slug('Sushi Sake'),
                'address' => 'Tokyo Avenue, Tokyo',
                'phone' => '+81 3-1234-5678',
                'vat' => 'JP876543210',
                'description' => 'Sushi fresco e sashimi prelibati.',
            ],
            [
                'user_id' => 4,
                'name' => 'Taco Express',
                'slug' => Str::slug('Taco Express'),
                'address' => '123 Taco Street, Mexico City',
                'phone' => '+52 55 1234 5678',
                'vat' => 'MX567890123',
                'description' => 'Tacos autentici e burritos deliziosi.',
            ],
            [
                'user_id' => 5,
                'name' => 'Pasta Paradiso',
                'slug' => Str::slug('Pasta Paradiso'),
                'address' => 'Via Dante, 5, Milano',
                'phone' => '+39 02 9876543',
                'vat' => 'IT09876543210',
                'description' => 'Piatti di pasta fresca fatta in casa.',
            ],
            [
                'user_id' => 6,
                'name' => 'Curry House',
                'slug' => Str::slug('Curry House'),
                'address' => '124 Curry Lane, London',
                'phone' => '+44 20 1234 5678',
                'vat' => 'GB765432109',
                'description' => 'Cibi indiani speziati e curry aromatici.',
            ],
            [
                'user_id' => 7,
                'name' => 'BBQ Shack',
                'slug' => Str::slug('BBQ Shack'),
                'address' => '123 Barbecue Road, Austin',
                'phone' => '+1 512-555-1234',
                'vat' => 'US654321098',
                'description' => 'Specialità di barbecue e carne affumicata.',
            ],
            [
                'user_id' => 8,
                'name' => 'Dim Sum Delight',
                'slug' => Str::slug('Dim Sum Delight'),
                'address' => '888 Dim Sum Avenue, Hong Kong',
                'phone' => '+852 1234 5678',
                'vat' => 'HK012345678',
                'description' => 'Dim sum tradizionale e autentico.',
            ],
            [
                'user_id' => 9,
                'name' => 'Mediterranean Bistro',
                'slug' => Str::slug('Mediterranean Bistro'),
                'address' => 'Avenue des Champs-Élysées, Paris',
                'phone' => '+33 1 1234 5678',
                'vat' => 'FR987654321',
                'description' => 'Cucina mediterranea fresca e deliziosa.',
            ],
            [
                'user_id' => 10,
                'name' => 'Ramen House',
                'slug' => Str::slug('Ramen House'),
                'address' => '123 Ramen Street, Tokyo',
                'phone' => '+81 3-9876-5432',
                'vat' => 'JP543210987',
                'description' => 'Ramen fumanti e gustosi brodi giapponesi.',
            ],
        ];

        foreach ($restaurantsData as $restaurantData) {
            // Crea il ristorante
            $restaurant = Restaurant::create($restaurantData);

            // Recupera le tipologie associate ai ristoranti
            $types = Type::inRandomOrder()->limit(3)->get(); // Ad esempio, seleziona casualmente 3 tipologie

            // Associa le tipologie al ristorante
            $restaurant->types()->attach($types);
        }
    }
}
