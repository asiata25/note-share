<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'lutfi khoir',
            'email' => 'asiatakh25@gmail.com',
            'password' => 'asdqwe123'
        ]);

        Note::factory(11)->create(['user_id' => $user->id]);
    }
}
