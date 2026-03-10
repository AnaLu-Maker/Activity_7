<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoboticsKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kits = [
            [
                'name'        => 'StarterKit',
                'description' => 'Entry-level kit designed for beginners. Includes basic structural '
                               . 'components, DC motors, a micro-controller board, LED modules, and '
                               . 'step-by-step assembly guides. Ideal for ages 8 and up with no prior '
                               . 'robotics experience.',
            ],
            [
                'name'        => 'Kit5',
                'description' => 'Intermediate kit that expands on the StarterKit. Incorporates servo '
                               . 'motors, ultrasonic distance sensors, IR line-following sensors, and '
                               . 'a Bluetooth communication module. Suited for students who have '
                               . 'completed at least one introductory robotics course.',
            ],
            [
                'name'        => 'AdvancedKit',
                'description' => 'Professional-grade kit for advanced learners. Features a Raspberry Pi '
                               . 'compute module, camera vision sensor, LiDAR module, robotic arm joints, '
                               . 'and a companion mobile app for remote control. Supports Python and '
                               . 'ROS-based programming projects.',
            ],
        ];

        foreach ($kits as $kit) {
            DB::table('robotics_kits')->updateOrInsert(
                ['name' => $kit['name']],
                array_merge($kit, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('Robotics kits seeded successfully.');
    }
}
