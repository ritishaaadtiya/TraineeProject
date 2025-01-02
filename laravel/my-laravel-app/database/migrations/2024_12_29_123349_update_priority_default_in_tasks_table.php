<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE tasks MODIFY COLUMN status ENUM('medium', 'low', 'high') DEFAULT 'low'");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE tasks MODIFY COLUMN status ENUM('medium', 'low', 'high') DEFAULT 'medium'");
        });
    }
};
