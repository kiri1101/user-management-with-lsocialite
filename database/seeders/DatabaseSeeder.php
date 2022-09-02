<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'Neil',
            'name' => 'Neil Sims',
            'position' => 'React Developer',
            'status' => true,
            'email' => 'neil.sims@hotmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Bonnie',
            'name' => 'Bonnie Green',
            'position' => 'Designer',
            'status' => true,
            'email' => 'bonnie@hotmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Jese',
            'name' => 'Jese Leos',
            'position' => 'Vue JS Developer',
            'status' => true,
            'email' => 'jese@hotmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Thomas',
            'name' => 'Thomas Lean',
            'position' => 'UI/UX Engineer',
            'status' => true,
            'email' => 'thomas@hotmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Leslie',
            'name' => 'Leslie Livingston',
            'position' => 'SEO Specialist',
            'status' => false,
            'email' => 'leslie@hotmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
