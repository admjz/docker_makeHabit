<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExecutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('executions')->truncate();
        DB::table('executions')->insert([
            [
                'habit_id' => 1,
                'contents'   => 'PHP',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(10)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(10)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'PHP',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(9)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(9)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'PHP',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(8)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(8)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'PHP',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(7)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(7)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'PHP',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(6)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(6)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Laravel',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(5)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(5)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Laravel',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(4)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(4)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Laravel',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(3)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(3)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Laravel',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(2)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(2)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Mysql',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(1)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(1)->toDateString())
            ],
            [
                'habit_id' => 1,
                'contents'   => 'Mysql',
                'created_at' => Carbon::create(Carbon::now()->subDays(1)->addHours(5)->toDateTimeString()),
                'updated_at' => Carbon::create(Carbon::now()->subDays(1)->addHours(5)->toDateTimeString())
            ],
            [
                'habit_id' => 2,
                'contents'   => '腹筋50回',
                'created_at' => Carbon::create(Carbon::yesterday()->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->toDateString())
            ],
            [
                'habit_id' => 2,
                'contents'   => '腕立て伏せ50回',
                'created_at' => Carbon::create(Carbon::now()->toDateTimeString()),
                'updated_at' => Carbon::create(Carbon::now()->toDateTimeString())
            ],
            [
                'habit_id' => 3,
                'contents'   => '',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(19)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(19)->toDateString())
            ],
            [
                'habit_id' => 3,
                'contents'   => '',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(18)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(18)->toDateString())
            ],
            [
                'habit_id' => 3,
                'contents'   => '',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(16)->toDateString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(16)->toDateString())
            ],
            [
                'habit_id' => 3,
                'contents'   => '',
                'created_at' => Carbon::create(Carbon::yesterday()->subDays(10)->subHours(10)->toDateTimeString()),
                'updated_at' => Carbon::create(Carbon::yesterday()->subDays(10)->subHours(10)->toDateTimeString())
            ],
        ]);
    }
}
