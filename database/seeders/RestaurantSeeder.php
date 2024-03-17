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
        $restaurantsData = config('restaurants-db');

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
