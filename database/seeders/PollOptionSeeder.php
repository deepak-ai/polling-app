<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class PollOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Labor Party',
            'Description' => 'Description for Labor Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Liberal Party',
            'Description' => 'Description Liberal Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Liberal Nationals Party',
            'Description' => 'Description about Liberal Nationals Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Nationals Party',
            'Description' => 'Desctiption about Nationals Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Greens Party',
            'Description' => 'Description about Greens Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('poll_options')->insert([
            'poll_id' => 1,
            'value' => 'Independent Party',
            'Description' => 'Description about Independent Party',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
