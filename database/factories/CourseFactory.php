<?php
namespace Database\Factories;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        // Obtener un ID aleatorio de los kits existentes
        $kitId = RoboticsKit::inRandomOrder()->first()?->id ?? 1;

        return [
            // Clave única tipo ROB + 3 números: ROB123
            'course_key'      => 'ROB' . $this->faker->unique()->numberBetween(105, 9999),

            // Título académico de 3 a 6 palabras
            'title'           => ucwords($this->faker->words(
                                    rand(3, 6), true)),

            // URL de imagen de portada del curso
            'cover'           => $this->faker->imageUrl(640, 480, 'technology'),

            // Contenido del curso: 2 a 4 párrafos
            'content'         => $this->faker->paragraphs(
                                    rand(2, 4), true),

            // FK al kit de robótica (aleatorio entre los existentes)
            'robotics_kit_id' => $kitId,
        ];
    }
}