<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a demo admin
        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create a demo agent
        Agent::create([
            'name' => 'Agent User',
            'email' => 'agent@gmail.com',
            'password' => Hash::make('password'),
            'department' => 'Support',
            'agent_id' => 'AGT'.str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT),
        ]);
    }
}