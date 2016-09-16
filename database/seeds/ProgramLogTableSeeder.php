<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class ProgramLogTableSeeder extends AppSeeder
{
    private $program_log;

    public function __construct(
        \App\Services\ProgramLogService $program_log
    ) {
        $this->program_log = $program_log;
    }

    public function run()
    {
        DB::table('program_logs')->delete();

        $program_logs = [
            ['programId' => 1, 'price' => 100],
            ['programId' => 1, 'price' => 110],
            ['programId' => 1, 'price' => 120],
            ['programId' => 1, 'price' => 130],
            ['programId' => 1, 'price' => 140],
        ];

        foreach ($program_logs as $index => $log) {
            $logData = $this->program_log->create($log['programId'], $log['programId']);
            $this->changeId($logData, $index + 1);
        }
    }
}
