<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = config('dishes-db');

        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();

        // Svuota la tabella
        Dish::truncate();

        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();

        // Genera i piatti
        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
    }
}
