<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoboticsKit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefix     = $this->faker->randomElement(['Rob', 'Kit', 'Bot', 'Mec', 'Dig']);
        $number     = $this->faker->unique()->numberBetween(100, 999);
        $courseKey  = $prefix . $number;                          

  
        $topics = [
            'Introduction to Robotics',
            'Autonomous Navigation',
            'Sensor Fusion Fundamentals',
            'Line-Following Robots',
            'Robotic Arm Programming',
            'Computer Vision for Robots',
            'Bluetooth-Controlled Vehicles',
            'PID Control Theory',
            'Machine Learning with Microcontrollers',
            'STEM Robotics Workshop',
            'Embedded Systems Basics',
            'Servo Motor Control',
            'Robot Kinematics & Dynamics',
            'Maze-Solving Algorithms',
            'IoT and Robotics Integration',
        ];

        $levels = ['Beginner', 'Intermediate', 'Advanced', 'Professional'];

        $title = sprintf(
            '%s: %s – %s Level',
            $courseKey,
            $this->faker->randomElement($topics),
            $this->faker->randomElement($levels)
        );


        $title = mb_substr($title, 0, 200);


        $cover = $this->faker->boolean(70)
            ? 'covers/' . strtolower($courseKey) . '.jpg'
            : null;


        $content = $this->faker->boolean(85)
            ? implode("\n\n", $this->faker->paragraphs(
                $this->faker->numberBetween(2, 5)
              ))
            : null;

        $kitId = RoboticsKit::inRandomOrder()->value('id')
               ?? RoboticsKit::factory()->create()->id;

        return [
            'course_key'       => $courseKey,
            'title'            => $title,
            'cover'            => $cover,
            'content'          => $content,
            'robotics_kit_id'  => $kitId,
        ];
    }
}
