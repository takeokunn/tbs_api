<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    protected function changeId($modelData_, int $newId_)
    {
        $modelData_->id = $newId_;
        $modelData_->save();
    }
}
