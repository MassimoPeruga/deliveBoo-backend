<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Restaurant;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();

        // Svuota le tabelle
        DB::table('orders')->truncate();
        DB::table('dish_order')->truncate();

        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();

        $faker = Factory::create('it_IT');
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            // Genera un numero casuale di ordini per ogni ristorante
            $ordersCount = rand(1, 32);

            // Se il ristorante non ha piatti, passa al prossimo ristorante
            $dishes = $restaurant->dishes;
            if ($dishes->isEmpty()) {
                continue;
            }

            for ($i = 0; $i < $ordersCount; $i++) {
                $dishes = $restaurant->dishes;
                $totalAmount = 0;

                $name = $faker->firstName;
                $surname = $faker->lastName;

                // Crea un nuovo ordine
                $order = new Order();
                $order->name = $name;
                $order->surname = $surname;
                $order->phone = $faker->phoneNumber;
                $order->email = strtolower($name . '.' . $surname . '@example.com');
                $order->delivery_address = $faker->streetAddress . ', Roma';
                $order->total_amount = $totalAmount;
                $order->save();

                // Aggiungi un numero casuale di piatti all'ordine
                $dishesCount = rand(1, $dishes->count());

                for ($j = 0; $j < $dishesCount; $j++) {
                    $dish = $dishes->random();
                    $quantity = rand(1, 5);

                    // Verifica se il piatto è già stato aggiunto all'ordine
                    if (!$order->dishes()->where('dish_id', $dish->id)->exists()) {
                        // Aggiungi il piatto all'ordine
                        $order->dishes()->attach($dish->id, ['quantity' => $quantity]);

                        // Aggiorna il totale dell'ordine
                        $totalAmount += $dish->price * $quantity;
                    }
                }

                $order->total_amount = $totalAmount;
                $order->save();
            }
        }
    }
}
