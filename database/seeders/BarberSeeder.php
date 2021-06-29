<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Paulo',
            'nickname' => 'paulosan',
            'type' => 'admin',
            'email' => 'contacto@paulosan.com',
            'password' => Hash::make('webosperro')
        ]);

        User::create([
            'name' => 'Ventas',
            'nickname' => 'ventas',
            'type' => 'admin',
            'email' => 'ventas@izquierdobarber.com',
            'password' => Hash::make('Izquierdopass2021!')
        ]);

        User::create([
            'name' => 'Javier',
            'nickname' => 'javierbarber',
            'type' => 'barber',
            'email' => 'javier@izquierdobarber.com',
            'password' => Hash::make('Javierpass2021!')
        ]);

        User::create([
            'name' => 'Angel',
            'nickname' => 'angelbarber',
            'type' => 'barber',
            'email' => 'angel@izquierdobarber.com',
            'password' => Hash::make('Angelpass2021!')
        ]);

        User::create([
            'name' => 'Ricardo',
            'nickname' => 'ricardobarber',
            'type' => 'barber',
            'email' => 'ricardo@izquierdobarber.com',
            'password' => Hash::make('Ricardopass2021!')
        ]);
    }
}
