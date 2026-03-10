<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RoboticsKitSeeder::class,
        ]);

        // Generate 100 courses using CourseFactory
        Course::factory()->count(100)->create();

        $this->command->info('Database seeded: roles, users, robotics kits, and 100 courses.');
    }
}
