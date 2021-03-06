<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(ProgramLogTableSeeder::class);
        $this->call(StockTableSeeder::class);
        $this->call(ProgramInfoTableSeeder::class);

        Model::reguard();
    }
}
