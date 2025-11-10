<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa@gmail.com',
            'level'=>'mahasiwa',
            'password'=>'123'
            // 'password' => bcrypt('pass1234'),

        ]);
        User::factory()->create([
            'name' => 'Dosen 1',
            'email' => 'dosen@gmail.com',
            'level'=>'dosen',
            'password'=>'123'
            // 'password' => bcrypt('pass1234')

        ]);
        
    }
}
