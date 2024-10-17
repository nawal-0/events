<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Event::create([
            'title' => 'Laravel Meetup',
            'description' => 'A meetup for Laravel enthusiasts',
            'date' => '2024-10-24',
            'start_time' => '18:00:00',
            'end_time' => '20:00:00',
            'location' => 'Laravel HQ',
            'user_id' => 1,
        ]);

        Event::create([
            'title' => 'Vue.js Workshop',
            'description' => 'A workshop for Vue.js developers',
            'date' => '2024-10-24',
            'start_time' => '09:00',
            'end_time' => '17:00',
            'location' => 'Vue.js HQ',
            'user_id' => 1,
        ]);

        Event::create([
            'title' => 'React Conference',
            'description' => 'A conference for React developers',
            'date' => '2024-10-24',
            'start_time' => '09:00',
            'end_time' => '17:00',
            'location' => 'React HQ',
            'user_id' => 1,
        ]);
    }
}
