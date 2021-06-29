<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'service_name' => 'Fade o desvanecido',
            'slug' => Str::slug('fade o desvanecido'),
            'price' => 120,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombres-cabello-corto-fade-degradado-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte clásico',
            'slug' => Str::slug('corte clásico'),
            'price' => 100,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombres-texturizado-cabello-largo-peinado-arreglado-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte y barba con toalla',
            'slug' => Str::slug('corte y barba con toalla'),
            'price' => 160,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte y barba con vapor',
            'slug' => Str::slug('corte y barba con vapor'),
            'price' => 170,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte de ceja',
            'slug' => Str::slug('corte de ceja'),
            'price' => 40,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Barba sin corte',
            'slug' => Str::slug('Barba sin corte'),
            'price' => 60,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Barba con vapor sin corte',
            'slug' => Str::slug('Barba con vapor sin corte'),
            'price' => 70,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte de niño',
            'slug' => Str::slug('Corte de niño'),
            'price' => 100,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte de niño 1 a 5 años',
            'slug' => Str::slug('Corte de niño 1 a 5 años'),
            'price' => 80,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Mascarilla Negra',
            'slug' => Str::slug('Mascarilla Negra'),
            'price' => 50,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Facial',
            'slug' => Str::slug('Facial'),
            'price' => 50,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);

        Service::create([
            'service_name' => 'Corte VIP',
            'slug' => Str::slug('Barba sin corte'),
            'price' => 240,
            'img' => 'https://mensandbeauty.com/wp-content/uploads/2019/04/mejores-cortes-de-pelo-hombre-cabello-largo-dapper-2.jpg'
        ]);
    }
}
