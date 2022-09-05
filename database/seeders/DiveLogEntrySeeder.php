<?php

namespace Database\Seeders;

use App\Models\DiveLogEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiveLogEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log = new DiveLogEntry();
        $log->user_id = 1;
        $log->location = 'Bahamas';
        $log->bottom_time = '58 minutes';
        $log->max_depth = '40 ft';
        $log->options = json_encode([]);
        $log->save();

        $log = new DiveLogEntry();
        $log->user_id = 1;
        $log->location = 'Jamaica';
        $log->bottom_time = '12 minutes';
        $log->max_depth = '90 ft';
        $log->options = json_encode([]);
        $log->save();
    }
}
