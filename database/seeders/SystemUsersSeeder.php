<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creo administrador
        User::create([
            'name'          => 'Julian N',
            'email'          => 'frelian@gmail.com',
            'email_verified_at' => now(),
            'password'       => bcrypt('x123456'),
        ]);

        User::create([
            'name'          => 'Pepito Perez',
            'email'          => 'pepitoperez@yopmail.com',
            'email_verified_at' => now(),
            'password'       => bcrypt('x123456'),
        ]);

        User::create([
            'name'          => 'Maria Xin',
            'email'          => 'mariaxin@yopmail.com',
            'email_verified_at' => now(),
            'password'       => bcrypt('x123456'),
        ]);
    }
}
