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

        \App\Models\Checkoutbox::factory()->create([
            'point' => '22222',
            'money' => '123',
            'user' => 'administrador',
            'estado' => '1' //password
        ]);
    }
}
