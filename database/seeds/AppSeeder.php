<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * change data id
     * @param  Object $modelData_
     * @param  int    $newId_
     */
    protected function changeId($modelData_, int $newId_)
    {
        $modelData_->id = $newId_;
        $modelData_->save();
    }
}
