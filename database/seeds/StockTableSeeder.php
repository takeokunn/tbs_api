<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class StockTableSeeder extends AppSeeder
{
    private $stock;

    public function __construct(
        \App\Services\StockService $stock
    ) {
        $this->stock = $stock;
    }

    public function run()
    {
        DB::table('stocks')->delete();

        $stocks = [
            ['user_id' => 1, 'program_id' => 1, 'number' => 1],
            ['user_id' => 1, 'program_id' => 2, 'number' => 2],
            ['user_id' => 1, 'program_id' => 3, 'number' => 3],
            ['user_id' => 1, 'program_id' => 4, 'number' => 4],
            ['user_id' => 1, 'program_id' => 5, 'number' => 5],
        ];

        foreach ($stocks as $index => $stock) {
            $stockData = $this->stock->create($stock['user_id'], $stock['program_id'], $stock['number']);
            $this->changeId($stockData, $index + 1);
        }
    }
}
