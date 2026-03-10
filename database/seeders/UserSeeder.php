<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ── 1. Seed roles ────────────────────────────────────────────────
        $roles = [
            ['name' => 'Administrative', 'description' => 'Full platform access manages users, kits and courses.'],
            ['name' => 'Teacher',        'description' => 'Creates and publishes course content and didactic materials.'],
            ['name' => 'Student',        'description' => 'Enrols in groups and consumes course content.'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                array_merge($role, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        // ── 2. Resolve role IDs ──────────────────────────────────────────
        $adminRoleId   = DB::table('roles')->where('name', 'Administrative')->value('id');
        $teacherRoleId = DB::table('roles')->where('name', 'Teacher')->value('id');
        $studentRoleId = DB::table('roles')->where('name', 'Student')->value('id');

        // ── 3. Seed users ────────────────────────────────────────────────
        $users = [
            [
                'name'     => 'Admon',
                'email'    => 'admon@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role_id'  => $adminRoleId,
            ],
            [
                'name'     => 'Tecmilenio',
                'email'    => 'tecmilenio@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role_id'  => $teacherRoleId,
            ],
            [
                'name'     => 'Student',
                'email'    => 'student@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role_id'  => $studentRoleId,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                array_merge($user, [
                    'email_verified_at' => now(),
                    'remember_token'    => \Illuminate\Support\Str::random(10),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ])
            );
        }

        $this->command->info('Roles and users seeded successfully.');
    }
}
