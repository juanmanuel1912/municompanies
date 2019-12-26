<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Zdubhy56fQ3Nuh9CWuuveuMtYmi1z3Osywrgrg5uZmxdCqggywjB6',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
