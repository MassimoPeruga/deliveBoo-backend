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
        // Array di dati dei ristoranti con le tipologie desiderate
        $restaurantsData = [
            [
                'user_id' => 1,
                'name' => 'Pizzeria Italia',
                'slug' => Str::slug('Pizzeria Italia'),
                'address' => 'Via Nazionale, 12, Roma',
                'phone' => '+39 06 1234567',
                'vat' => '11123456789',
                'description' => 'Pizza tradizionale italiana e altri piatti italiani.',
                'image' => 'restaurants/pizzeria-italia.jpg',
                'types' => ['Italiano', 'Pizzeria'],
            ],
            [
                'user_id' => 2,
                'name' => 'Curry House',
                'slug' => Str::slug('Curry House'),
                'address' => 'Piazza San Pietro, 5, Roma',
                'phone' => '+44 20 1234 5678',
                'vat' => '12765432109',
                'description' => 'Cibi indiani speziati e curry aromatici.',
                'image' => 'restaurants/curry-house.jpeg',
                'types' => ['Indiano'],
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Sake',
                'slug' => Str::slug('Sushi Sake'),
                'address' => 'Piazza di Spagna, 2, Roma',
                'phone' => '+81 3-1234-5678',
                'vat' => '13876543210',
                'description' => 'Sushi fresco e sashimi prelibati.',
                'image' => 'restaurants/Sake-Sushi-Logo.png',
                'types' => ['Giapponese', 'Sushi'],
            ],
            [
                'user_id' => 4,
                'name' => 'Taco Express',
                'slug' => Str::slug('Taco Express'),
                'address' => 'Piazza Navona, 3, Roma',
                'phone' => '+52 55 1234 5678',
                'vat' => '14567890123',
                'description' => 'Tacos autentici e burritos deliziosi.',
                'image' => 'restaurants/taco-express.jpeg',
                'types' => ['Messicano'],
            ],
            [
                'user_id' => 5,
                'name' => 'Dim Sum Delight',
                'slug' => Str::slug('Dim Sum Delight'),
                'address' => 'Piazza del Popolo, 7, Roma',
                'phone' => '+852 1234 5678',
                'vat' => '15012345678',
                'description' => 'Dim sum tradizionale e autentico.',
                'image' => 'restaurants/dim-sum.jpeg',
                'types' => ['Cinese'],
            ],
            [
                'user_id' => 6,
                'name' => 'Ristorante Elegante',
                'slug' => Str::slug('Ristorante Elegante'),
                'address' => 'Via Condotti, 30, Roma',
                'phone' => '+39 06 3456789',
                'vat' => '16543210987',
                'description' => 'Cucina raffinata e servizio impeccabile.',
                'image' => 'restaurants/ristoranti-eleganti.jpeg',
                'types' => ['Italiano'],
            ],
            [
                'user_id' => 7,
                'name' => 'Veggy Deligth',
                'slug' => Str::slug('Veggy Deligth'),
                'address' => 'Piazza di Spagna, 20, Roma',
                'phone' => '+39 06 5432109',
                'vat' => '17321098765',
                'description' => 'Pane fresco e dolci appena sfornati.',
                'image' => 'restaurants/veggy.png',
                'types' => ['Vegano', 'Vegetariano'],
            ],
            [
                'user_id' => 8,
                'name' => 'Burger Palace',
                'slug' => Str::slug('Burger Palace'),
                'address' => 'Piazza Venezia, 1, Roma',
                'phone' => '+1 212-555-1234',
                'vat' => '18987654321',
                'description' => 'Hamburger succulenti e patatine croccanti.',
                'image' => 'restaurants/burger-palace.png',
                'types' => ['Fast-Food'],
            ],
            [
                'user_id' => 9,
                'name' => 'Pizzeria Bella Napoli',
                'slug' => Str::slug('Pizzeria Bella Napoli'),
                'address' => 'Viale dei Parioli, 25, Roma',
                'phone' => '+39 06 2345678',
                'vat' => '19876543222',
                'description' => 'Pizza napoletana autentica e gustosa.',
                'image' => 'restaurants/bella-napoli.png',
                'types' => ['Italiano', 'Pizzeria'],
            ],
            [
                'user_id' => 10,
                'name' => 'Nippon',
                'slug' => Str::slug('Nippon'),
                'address' => 'Piazza di Spagna, 2, Roma',
                'phone' => '+81 3-1234-5678',
                'vat' => '22876543210',
                'description' => 'Sushi fresco e sashimi prelibati.',
                'image' => 'restaurants/nippon.jpeg',
                'types' => ['Giapponese', 'Sushi'],
            ],
            [
                'user_id' => 11,
                'name' => 'Ramen House',
                'slug' => Str::slug('Ramen House'),
                'address' => 'Piazza Barberini, 9, Roma',
                'phone' => '+81 3-9876-5432',
                'vat' => '23543210987',
                'description' => 'Ramen fumanti e gustosi brodi giapponesi.',
                'image' => 'restaurants/ramen-house.png',
                'types' => ['Cinese'],
            ],
            [
                'user_id' => 12,
                'name' => 'Sulemani Kebab',
                'slug' => Str::slug('Sulemani Kebab'),
                'address' => 'Via Appia, 20, Roma',
                'phone' => '+39 06 7654321',
                'vat' => '24234567890',
                'description' => 'Kebab gustoso e pietanze mediorientali.',
                'image' => 'restaurants/suleman.jpg',
                'types' => ['Kebab'],
            ],
            [
                'user_id' => 13,
                'name' => 'BBQ Heaven',
                'slug' => Str::slug('BBQ Heaven'),
                'address' => 'Viale Trastevere, 30, Roma',
                'phone' => '+39 06 8765432',
                'vat' => '25345678901',
                'description' => 'Grigliate succulente e carni alla brace.',
                'image' => 'restaurants/bbq-heaven.jpg',
                'types' => ['Barbecue'],
            ],
            [
                'user_id' => 14,
                'name' => 'Gelateria Delizia',
                'slug' => Str::slug('Gelateria Delizia'),
                'address' => 'Via Cola di Rienzo, 40, Roma',
                'phone' => '+39 06 6543210',
                'vat' => '26456789012',
                'description' => 'Gelato artigianale e sorbetti freschi.',
                'image' => 'restaurants/gelateria-delizia.jpg',
                'types' => ['Italiano', 'Gelateria', 'Vegetariano'],
            ],
            [
                'user_id' => 15,
                'name' => 'Pasticceria Fantasia',
                'slug' => Str::slug('Pasticceria Fantasia'),
                'address' => 'Piazza Navona, 50, Roma',
                'phone' => '+39 06 5432109',
                'vat' => '27567890123',
                'description' => 'Dolci deliziosi e pasticceria di alta qualità.',
                'image' => 'restaurants/pasticceria-fantasia.png',
                'types' => ['Pasticceria'],
            ],
            [
                'user_id' => 16,
                'name' => 'Caffè Italia',
                'slug' => Str::slug('Caffè Italia'),
                'address' => 'Via Veneto, 60, Roma',
                'phone' => '+39 06 4321098',
                'vat' => '28678901234',
                'description' => 'Caffè pregiato e deliziosi dolci fatti in casa.',
                'image' => 'restaurants/caffetteria-italia.png',
                'types' => ['Italiano', 'Caffetteria'],
            ],
        ];

        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();

        // Scorri tutti i ristoranti e dissociare i tipi
        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {
            $restaurant->types()->detach();
        }

        // Svuota la tabella
        Restaurant::truncate();

        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();

        foreach ($restaurantsData as $restaurantData) {
            // Salva i tipi in una variabile e rimuovili dall'array dei dati del ristorante
            $types = $restaurantData['types'];
            unset($restaurantData['types']);

            // Crea il ristorante
            $restaurant = Restaurant::create($restaurantData);

            // Recupera le tipologie in base ai loro nomi
            $types = Type::whereIn('name', $types)->get();

            // Associa le tipologie al ristorante
            $restaurant->types()->sync($types);
        }
    }
}
