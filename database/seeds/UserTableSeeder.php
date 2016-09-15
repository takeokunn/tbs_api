<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class UserTableSeeder extends AppSeeder
{
    private $user;

    public function __construct(
        \App\Services\UserService $user
    ) {
        $this->user = $user;
    }

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            ['name' => 'test1', 'email' => 'test1@gmail.com', 'password' => '1234'],
            ['name' => 'test2', 'email' => 'test2@gmail.com', 'password' => '1234'],
            ['name' => 'test3', 'email' => 'test3@gmail.com', 'password' => '1234'],
            ['name' => 'test4', 'email' => 'test4@gmail.com', 'password' => '1234'],
            ['name' => 'test5', 'email' => 'test5@gmail.com', 'password' => '1234'],
        ];

        foreach ($users as $index => $user) {
            $userData = $this->user->registerUser($user['name'], $user['email'], $user['password']);
            $this->changeId($userData, $index + 1);
        }
    }
}
