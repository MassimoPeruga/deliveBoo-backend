<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();
        // Svuota la tabella
        Type::truncate();
        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();
        $types = [
            ["name" => "Italiano", "image" => "types/italiano.jpg"],
            ["name" => "Cinese", "image" => "types/cinese.jpg"],
            ["name" => "Giapponese", "image" => "types/giapponese.jpg"],
            ["name" => "Messicano", "image" => "types/messicano.jpg"],
            ["name" => "Indiano", "image" => "types/indiano.jpg"],
            ["name" => "Vegano", "image" => "types/vegano.jpg"],
            ["name" => "Vegetariano", "image" => "types/vegetariano.jpg"],
            ["name" => "Fast-food", "image" => "types/fast-food.jpg"],
            ["name" => "Pizzeria", "image" => "types/pizza.jpg"],
            ["name" => "Sushi", "image" => "types/sushi.jpg"],
            ["name" => "Poke", "image" => "types/poke.jpg"],
            ["name" => "Kebab", "image" => "types/kebab.jpg"],
            ["name" => "Barbecue", "image" => "types/bbq.jpg"],
            ["name" => "Gelateria", "image" => "types/gelateria.jpg"],
            ["name" => "Pasticceria", "image" => "types/pasticceria.jpg"],
            ["name" => "Caffetteria", "image" => "types/caffetteria.jpg"],
        ];


        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = $type['image'];
            $new_type->save();
        }
    }
}
