<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();
        // Svuota la tabella
        Restaurant::truncate();
        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();

        // Array di dati dei ristoranti con le tipologie desiderate
        $restaurantsData = [
            [
                'user_id' => 1,
                'name' => 'Pizza Italia',
                'slug' => Str::slug('Pizza Italia'),
                'address' => 'Via Nazionale, 12, Roma',
                'phone' => '+39 06 1234567',
                'vat' => 'IT123456789',
                'description' => 'Pizza tradizionale italiana e altri piatti italiani.',
            ],
            [
                'user_id' => 2,
                'name' => 'Curry House',
                'slug' => Str::slug('Curry House'),
                'address' => 'Piazza San Pietro, 5, Roma',
                'phone' => '+44 20 1234 5678',
                'vat' => 'GB765432109',
                'description' => 'Cibi indiani speziati e curry aromatici.',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Sake',
                'slug' => Str::slug('Sushi Sake'),
                'address' => 'Piazza di Spagna, 2, Roma',
                'phone' => '+81 3-1234-5678',
                'vat' => 'IT876543210',
                'description' => 'Sushi fresco e sashimi prelibati.',
            ],
            [
                'user_id' => 4,
                'name' => 'Taco Express',
                'slug' => Str::slug('Taco Express'),
                'address' => 'Piazza Navona, 3, Roma',
                'phone' => '+52 55 1234 5678',
                'vat' => 'MX567890123',
                'description' => 'Tacos autentici e burritos deliziosi.',
            ],
            [
                'user_id' => 5,
                'name' => 'Dim Sum Delight',
                'slug' => Str::slug('Dim Sum Delight'),
                'address' => 'Piazza del Popolo, 7, Roma',
                'phone' => '+852 1234 5678',
                'vat' => 'HK012345678',
                'description' => 'Dim sum tradizionale e autentico.',
            ],
            [
                'user_id' => 6,
                'name' => 'Ristorante Elegante',
                'slug' => Str::slug('Ristorante Elegante'),
                'address' => 'Via Condotti, 30, Roma',
                'phone' => '+39 06 3456789',
                'vat' => 'IT543210987',
                'description' => 'Cucina raffinata e servizio impeccabile.',
            ],
            [
                'user_id' => 7,
                'name' => 'Veggy Deligth',
                'slug' => Str::slug('Veggy Deligth'),
                'address' => 'Piazza di Spagna, 20, Roma',
                'phone' => '+39 06 5432109',
                'vat' => 'IT321098765',
                'description' => 'Pane fresco e dolci appena sfornati.',
            ],
            [
                'user_id' => 8,
                'name' => 'Burger Palace',
                'slug' => Str::slug('Burger Palace'),
                'address' => 'Piazza Venezia, 1, Roma',
                'phone' => '+1 212-555-1234',
                'vat' => 'US987654321',
                'description' => 'Hamburger succulenti e patatine croccanti.',
            ],
            [
                'user_id' => 9,
                'name' => 'Pizzeria Bella Napoli',
                'slug' => Str::slug('Pizzeria Bella Napoli'),
                'address' => 'Viale dei Parioli, 25, Roma',
                'phone' => '+39 06 2345678',
                'vat' => 'IT876543222',
                'description' => 'Pizza napoletana autentica e gustosa.',
            ],
            [
                'user_id' => 10,
                'name' => 'Nippon',
                'slug' => Str::slug('Nippon'),
                'address' => 'Piazza di Spagna, 2, Roma',
                'phone' => '+81 3-1234-5678',
                'vat' => 'JP876543210',
                'description' => 'Sushi fresco e sashimi prelibati.',
            ],
            [
                'user_id' => 11,
                'name' => 'Ramen House',
                'slug' => Str::slug('Ramen House'),
                'address' => 'Piazza Barberini, 9, Roma',
                'phone' => '+81 3-9876-5432',
                'vat' => 'JP543210987',
                'description' => 'Ramen fumanti e gustosi brodi giapponesi.',
            ],
            [
                'user_id' => 12,
                'name' => 'Kebab King',
                'slug' => Str::slug('Kebab King'),
                'address' => 'Via Appia, 20, Roma',
                'phone' => '+39 06 7654321',
                'vat' => 'IT234567890',
                'description' => 'Kebab gustoso e pietanze mediorientali.',
            ],
            [
                'user_id' => 13,
                'name' => 'BBQ Heaven',
                'slug' => Str::slug('BBQ Heaven'),
                'address' => 'Viale Trastevere, 30, Roma',
                'phone' => '+39 06 8765432',
                'vat' => 'IT345678901',
                'description' => 'Grigliate succulente e carni alla brace.',
            ],
            [
                'user_id' => 14,
                'name' => 'Gelateria Delizia',
                'slug' => Str::slug('Gelateria Delizia'),
                'address' => 'Via Cola di Rienzo, 40, Roma',
                'phone' => '+39 06 6543210',
                'vat' => 'IT456789012',
                'description' => 'Gelato artigianale e sorbetti freschi.',
            ],
            [
                'user_id' => 15,
                'name' => 'Pasticceria Fantasia',
                'slug' => Str::slug('Pasticceria Fantasia'),
                'address' => 'Piazza Navona, 50, Roma',
                'phone' => '+39 06 5432109',
                'vat' => 'IT567890123',
                'description' => 'Dolci deliziosi e pasticceria di alta qualità.',
            ],
            [
                'user_id' => 16,
                'name' => 'Caffè Italia',
                'slug' => Str::slug('Caffè Italia'),
                'address' => 'Via Veneto, 60, Roma',
                'phone' => '+39 06 4321098',
                'vat' => 'IT678901234',
                'description' => 'Caffè pregiato e deliziosi dolci fatti in casa.',
            ],
        ];

        foreach ($restaurantsData as $restaurantData) {
            // Crea il ristorante
            $restaurant = Restaurant::create($restaurantData);

            // Recupera le tipologie associate ai ristoranti nell'ordine di salvataggio nel database
            $types = Type::orderBy('id')->limit(1)->get();

            // Associa le tipologie al ristorante
            $restaurant->types()->attach($types);
        }
    }
}
