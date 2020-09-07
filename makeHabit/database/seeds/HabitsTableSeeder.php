<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HabitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habits')->truncate();
        DB::table('habits')->insert([
            [
                'user_id' => 1,
                'title'   => 'プログラミングの勉強',
                'created_at' => Carbon::create(2020, 8, 14),
                'updated_at' => Carbon::create(2020, 8, 14)
            ],
            [
                'user_id' => 1,
                'title'   => '筋トレ',
                'created_at' => Carbon::create(2020, 8, 10),
                'updated_at' => Carbon::create(2020, 8, 10)
            ],
            [
                'user_id' => 1,
                'title'   => 'ランニング',
                'created_at' => Carbon::create(2020, 8, 1),
                'updated_at' => Carbon::create(2020, 8, 1)
            ],
        ]);
    }
}
