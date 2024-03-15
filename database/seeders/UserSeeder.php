<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilita temporaneamente i vincoli delle chiavi esterne
        Schema::disableForeignKeyConstraints();
        // Svuota la tabella
        User::truncate();
        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();

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
                'email' => 'marcoa@example.com',
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
            [
                'name' => 'Andrea',
                'surname' => 'Russo',
                'email' => 'andrea@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Chiara',
                'surname' => 'Bruni',
                'email' => 'chiara@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Simone',
                'surname' => 'Gallo',
                'email' => 'simone@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Valentina',
                'surname' => 'Ferrari',
                'email' => 'valentina@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Alessia',
                'surname' => 'Moretti',
                'email' => 'alessia@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Davide',
                'surname' => 'Ricci',
                'email' => 'davide@example.com',
                'password' => Hash::make('password123')
            ],
        ];

        // Genera gli utenti
        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
