<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usersData = [
            [
                'name' => 'Paolo',
                'surname' => 'Rossi',
                'email' => 'paolo@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Gianni',
                'surname' => 'Neri',
                'email' => 'gianni@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Maria',
                'surname' => 'Bianchi',
                'email' => 'maria@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Luca',
                'surname' => 'Verdi',
                'email' => 'luca@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Anna',
                'surname' => 'Gialli',
                'email' => 'anna@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Rosa',
                'email' => 'giovanni@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Laura',
                'surname' => 'Marrone',
                'email' => 'laura@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Marco',
                'surname' => 'Azzurri',
                'email' => 'marco@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Francesca',
                'surname' => 'Verdi',
                'email' => 'francesca@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Marco',
                'surname' => 'Bianchi',
                'email' => 'marco@example.com',
                'password' => Hash::make('password123')
            ],
        ];

        // Genera gli utenti
        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
