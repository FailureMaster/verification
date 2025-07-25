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

        \App\Models\User::factory()->create([
            'name' => 'admin@email.com',
            'phone' => '432488761574',
            'username' => 'boss',
            'user_role' => 'admin',
            'password' => '*$P;aW49dAX8nGY6',
            'email' => 'admin@email.com',
        ]);
    }
}
