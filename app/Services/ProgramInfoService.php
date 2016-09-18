<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\ProgramInfo;

class ProgramInfoService
{

    /**
     * create program_info
     * @param  int    $program_id_
     * @param  string $description_
     * @param  string $next_broadcast_time_
     * @param  string $next_description_
     * @param  string $privilege_1_
     * @param  string $privilege_2_
     * @param  string $privilege_1_url_
     * @param  string $privilege_2_url_
     * @return Object
     */
    public function create(
        int $program_id_,
        string $description_,
        string $next_broadcast_time_,
        string $next_description_,
        string $privilege_1_,
        string $privilege_2_,
        string $privilege_1_url_,
        string $privilege_2_url_
    )
    {
        $program_info = new ProgramInfo;
        $program_info->program_id          = $program_id_;
        $program_info->description         = $description_;
        $program_info->next_broadcast_time = $next_broadcast_time_;
        $program_info->next_description    = $next_description_;
        $program_info->privilege_1         = $privilege_1_;
        $program_info->privilege_2         = $privilege_2_;
        $program_info->privilege_1_url     = $privilege_1_url_;
        $program_info->privilege_2_url     = $privilege_2_url_;
        $program_info->save();

        return $program_info;
    }
}
