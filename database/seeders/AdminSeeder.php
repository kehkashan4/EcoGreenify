<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           User::updateOrCreate(
            [

                'id' => 1,
                'name' => 'Kehkashan',
                'email' => 'mdoll05@gmail.com',
                'password' => Hash::make('star*971'),
                'role' => 'admin',
                'phone_no' => '0314978562',
                'address' => 'Satellite Town',
                'profile' => 'Kehkashan.png'
            ]);
    }
}
