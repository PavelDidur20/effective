<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Test User $i",
                'email' => "testuser{$i}@example.com",
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
        }
    }
}