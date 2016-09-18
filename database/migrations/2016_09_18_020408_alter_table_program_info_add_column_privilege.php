<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProgramInfoAddColumnPrivilege extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_infos', function ($table) {
            $table->string('privilege_1')->nullable()->after('description');
            $table->string('privilege_2')->nullable()->after('privilege_1');
            $table->string('privilege_1_url')->nullable()->after('privilege_2');
            $table->string('privilege_2_url')->nullable()->after('privilege_1_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_infos', function ($table) {
            $table->dropColumn('privilege_1');
            $table->dropColumn('privilege_2');
            $table->dropColumn('privilege_1_url');
            $table->dropColumn('privilege_2_url');
        });
    }
}
