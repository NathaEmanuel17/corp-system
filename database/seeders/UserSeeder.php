<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        User::factory()->create([
            'name' => "Admin",
            'email' => "admin@email.com",
            'password' => "12345678",
            'role' => "admin",
            'cpf' => "00000000000",
            'cellphone' => "00000000000"
        ]);
    }
}
