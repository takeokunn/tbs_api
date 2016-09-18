<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Program;

class ProgramService
{
    /**
     * get program data
     * @return object
     */
    public function getAll()
    {
        return Program::with('program_info')->orderBy('updated_at', 'desc')->get();
    }

    /**
     * get program by program_id
     * @param  int    $programId_
     * @return Object
     */
    public function getByProgramId(int $programId_)
    {
        return Program::with('program_info')->where('id', '=', $programId_)->first();
    }

    /**
     * get program.now_price by programId
     * @param  int    $programId_
     * @return float
     */
    public function getNowPriceByProgramId(int $programId_) : float
    {
        return Program::where('id', '=', $programId_)->first()->now_price;
    }

    /**
     * create program and program_info
     * @param  string $name_
     * @param  (string|null) $image_url_
     * @return Object
     */
    public function create(string $name_, string $image_url_ = null)
    {
        $program = new Program;
        $program->name      = $name_;
        $program->image_url = $image_url_;
        $program->save();

        return $program;
    }

    /**
     * update program name
     * @param  int    $programId_
     * @param  string $name_
     * @return Object
     */
    public function updateName(int $programId_, string $name_)
    {
        $program = Program::where('id', '=', $programId_)->first();
        $program->name = $name_;
        $program->save();

        return $program;
    }

    /**
     * update program price
     * @param  int   $programId_
     * @param  float $price_
     * @return Object
     */
    public function updatePrice(int $programId_, float $price_)
    {
        $program = Program::where('id', '=', $programId_)->first();
        $program->now_price = $price_;
        $program->save();

        return $program;
    }

    /**
     * whether program is existed
     * @param  int     $programId_
     * @return boolean
     */
    public function isExist(int $programId_) : bool
    {
        return (bool)Program::where('id', '=', $programId_)->count();
    }
}
