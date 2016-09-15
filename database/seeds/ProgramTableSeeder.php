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
            ['name' => 'program1'],
            ['name' => 'program2'],
            ['name' => 'program3'],
            ['name' => 'program4'],
            ['name' => 'program5'],
        ];

        foreach ($programs as $index => $program) {
            $programData = $this->program->create($user['name']);
            $this->changeId($programData, $index + 1);
        }
    }
}
