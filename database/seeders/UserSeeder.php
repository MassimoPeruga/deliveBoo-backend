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
                'email' => 'paolo.rossi@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Gianni',
                'surname' => 'Neri',
                'email' => 'gianni.neri@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Maria',
                'surname' => 'Bianchi',
                'email' => 'maria.bianchi@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Luca',
                'surname' => 'Verdi',
                'email' => 'luca.verdi@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Anna',
                'surname' => 'Gialli',
                'email' => 'anna.gialli@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Rosa',
                'email' => 'giovanni.rosa@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Laura',
                'surname' => 'Marrone',
                'email' => 'laura.marrone@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Marco',
                'surname' => 'Azzurri',
                'email' => 'marco.azzuri@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Francesca',
                'surname' => 'Verdi',
                'email' => 'francesca.verdi@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Marco',
                'surname' => 'Bianchi',
                'email' => 'marco.bianchi@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Russo',
                'email' => 'andrea.russo@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Chiara',
                'surname' => 'Bruni',
                'email' => 'chiara.bruni@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Simone',
                'surname' => 'Gallo',
                'email' => 'simone.gallo@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Valentina',
                'surname' => 'Ferrari',
                'email' => 'valentina.ferrari@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Alessia',
                'surname' => 'Moretti',
                'email' => 'alessia.moretti@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Davide',
                'surname' => 'Ricci',
                'email' => 'davide.ricci@example.com',
                'password' => Hash::make('password123')
            ],
        ];

        // Genera gli utenti
        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
