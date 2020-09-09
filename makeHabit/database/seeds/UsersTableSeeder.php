<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name'              => 'Banjo&Kazui',
                'email'             => 'Banjo@gmai.com',
                'email_verified_at' => '2020-01-01 00:00:00',
                'password'          => Hash::make('banjobanjo'),
            ]
        ]);
    }
}
