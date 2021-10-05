<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // create test both Admin and Staff user for Abel Tadesse
        $users = [
            [
                'first_name' => 'Abel',
                'last_name' => 'Tadesse',
                'email' => 'abeltadesse@gmail.com',
                'phone_number' => '+251923325767',
                'address' => 'Addis Ababa , Ethiopia',
                'role' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'first_name' => 'Abel',
                'last_name' => 'Tadesse',
                'email' => 'abeltadesse367@gmail.com',
                'phone_number' => '+251923325767',
                'address' => 'Addis Ababa , Ethiopia',
                'role' => 'Staff',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        ];
        foreach ($users as $user) {
            if (User::where('email', $user['email'])->first() == null) {
                User::create($user);
            }
        }

    }


}
