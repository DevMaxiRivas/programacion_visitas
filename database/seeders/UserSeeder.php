<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'RAÚL DORADO',
                'email' => 'test@example.com',
                'cuil' => '12345678901',
                'password' => Hash::make('hierronort2609'),
                'rol' => 'admin',
            ]
        );
        User::create(
            [
                'name' => 'CURIOTTO FEDERICO',
                'email' => 'test4@example.com',
                'cuil' => '12345678902',
                'password' => Hash::make('hierronort2609'),
            ]
        );
        User::create(
            [
                'name' => 'CUELLAR EDUARDO',
                'email' => 'test2@example.com',
                'cuil' => '12345678904',
                'password' => Hash::make('hierronort2609'),
            ]
        );
        User::create(
            [
                'name' => 'THAMES LUIS',
                'email' => 'test3@example.com',
                'cuil' => '12345678903',
                'password' => Hash::make('hierronort2609'),
            ]
        );
        
    }
}
