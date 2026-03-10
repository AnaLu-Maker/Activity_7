<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Genera 100 cursos usando CourseFactory
        Course::factory()->count(100)->create();
    }
}
