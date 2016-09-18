<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class ProgramTableSeeder extends AppSeeder
{
    private $program;

    public function __construct(
        \App\Services\ProgramService $program
    ) {
        $this->program = $program;
    }

    public function run()
    {
        DB::table('programs')->delete();

        $programs = [
            ['name' => '水曜日のダウンタウン', 'image_url' => ''],
            ['name' => '林先生の初耳学'     , 'image_url' => ''],
            ['name' => 'HKT48のおでかけ！'  , 'image_url' => ''],
            ['name' => 'ゴロウデラックス'    , 'image_url' => '']
        ];

        foreach ($programs as $index => $program) {
            $programData = $this->program->create($program['name'], $program['image_url']);
            $this->changeId($programData, $index + 1);
        }
    }
}
