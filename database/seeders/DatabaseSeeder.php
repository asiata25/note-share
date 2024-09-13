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
        // User::all()->each(function (User $user) {
        //     Note::factory()->create(['user_id' => $user->id]);
        // });

        $user = User::factory()->create([
            'name' => 'Douglas Tromp',
            'email' => 'verdie_koss21@yahoo.com',
            'password' => 'password1'
        ]);

        Note::factory(11)->create(['user_id' => $user->id]);
    }
}
