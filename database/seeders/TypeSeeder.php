<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
            ["name" => "Italiano", "image" => "italiano.jpg"],
            ["name" => "Cinese", "image" => "cinese.jpg"],
            ["name" => "Giapponese", "image" => "giapponese.jpg"],
            ["name" => "Messicano", "image" => "messicano.jpg"],
            ["name" => "Indiano", "image" => "indiano.jpg"],
            ["name" => "Vegano", "image" => "vegano.jpg"],
            ["name" => "Vegetariano", "image" => "vegetariano.jpg"],
            ["name" => "Fast-food", "image" => "fast-food.jpg"],
            ["name" => "Pizzeria", "image" => "pizza.jpg"],
            ["name" => "Sushi", "image" => "sushi.jpg"],
            ["name" => "Poke", "image" => "poke.jpg"],
            ["name" => "Kebab", "image" => "kebab.jpg"],
            ["name" => "Barbecue", "image" => "bbq.jpg"],
            ["name" => "Gelateria", "image" => "gelateria.jpg"],
            ["name" => "Pasticceria", "image" => "pasticceria.jpg"],
            ["name" => "Caffetteria", "image" => "caffetteria.jpg"],
        ];


        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = 'types/' . $type['image'];

            // $new_type->image = 'storage/app/public/types' . Hash::make($type['image']) . '.jpg';

            // $new_type->image = Storage::url('types/' . $type['image']);

            // $imageHash = hash_file('md5', $type['image']);
            // $image = Storage::putFile('app/public/types', $imageHash);
            // $imageUrl = Storage::url($image);
            // $new_type->image = $imageUrl;

            $new_type->save();
        }
    }
}
