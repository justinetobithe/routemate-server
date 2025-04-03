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
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $students = [
            ['first_name' => 'Jose Emmanuel', 'last_name' => 'Bajao', 'email' => 'jeBajao@mcm.edu.ph', 'student_id' => '2023110514'],
            ['first_name' => 'Angelie Chrish', 'last_name' => 'Bastillada', 'email' => 'acBastillada@mcm.edu.ph', 'student_id' => '2023110467'],
            ['first_name' => 'Nicholas', 'last_name' => 'Cagatan', 'email' => 'nCagatan@mcm.edu.ph', 'student_id' => '2023110489'],
            ['first_name' => 'Jewel', 'last_name' => 'Eugster', 'email' => 'jEugster@mcm.edu.ph', 'student_id' => '2023110476'],
            ['first_name' => 'Leanna Zyxa', 'last_name' => 'Guiamal', 'email' => 'lzGuiamal@mcm.edu.ph', 'student_id' => '2023110523'],
            ['first_name' => 'Lance Adrian', 'last_name' => 'Lim', 'email' => 'laLim@mcm.edu.ph', 'student_id' => '2023110451'],
            ['first_name' => 'Jamaica Reich', 'last_name' => 'Olea', 'email' => 'jrOlea@mcm.edu.ph', 'student_id' => '2023110138'],
        ];

        foreach ($students as $student) {
            $user = DB::table('users')->insertGetId([
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'],
                'email' => $student['email'],
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('students')->insert([
                'user_id' => $user,
                'student_id' => $student['student_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
