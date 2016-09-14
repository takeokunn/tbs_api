<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends AppSeeder
{

    private $profile;

    public function __construct(
        \App\Services\ProfileService $profile
    ) {
        $this->profile = $profile;
    }

    public function run()
    {
        DB::table('profiles')->delete();

        $profileDatas = [
            ['userId' => 1, 'username' => 'testusername1', 'description' => 'fdsafafasfasfdfasdfasfa'],
            ['userId' => 2, 'username' => 'testusername2', 'description' => 'fdsafafasfasfdfdasfdasa'],
            ['userId' => 3, 'username' => 'testusername3', 'description' => 'fdsafafasfasffdsafdsada'],
            ['userId' => 4, 'username' => 'testusername4', 'description' => 'fdsafsdafasfasdfasdffaa'],
            ['userId' => 5, 'username' => 'testusername5', 'description' => 'fdasfasdfasdfasfdafasdf'],
        ];

        foreach ($profileDatas as $index => $data) {
            $profileData = $this->profile->create($data['userId'], $data['username'], $data['description']);
            $this->changeId($profileData, $index + 1);
        }
    }
}
