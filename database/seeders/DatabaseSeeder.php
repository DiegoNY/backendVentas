<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Checkoutbox::factory(10)->create([
            'point' => '22222',
            'money' => '123',
            'user' => 'administrador',
            'dni' => '1234556',
            'estado' => '1' //password
        ]);
    }
}
