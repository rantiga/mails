<?php

use Illuminate\Database\Seeder;

class LoginSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'tms' => '2020-02-15 00:00:00',
                'source' => 'site',
            ],
            [
                'user_id' => '2',
                'tms' => '2020-02-03 00:00:00',
                'source' => 'android',
            ],
            [
                'user_id' => '2',
                'tms' => '2020-02-07 00:00:00',
                'source' => 'site',
            ],
            [
                'user_id' => '2',
                'tms' => '2020-02-17 00:00:00',
                'source' => 'site',
            ],
            [
                'user_id' => '2',
                'tms' => '2019-08-30 00:00:00',
                'source' => 'site',
            ],
            [
                'user_id' => '3',
                'tms' => '2020-02-24 00:00:00',
                'source' => 'iphone',
            ],
            [
                'user_id' => '4',
                'tms' => '2020-02-20 00:00:00',
                'source' => 'site',
            ],
//            [
//                'user_id' => '1',
//                'tms' => \Carbon\Carbon::now()->subDays(3)->timestamp,
//                'source' => 'site',
//            ],
//            [
//                'user_id' => '2',
//                'tms' => \Carbon\Carbon::now()->subWeeks(3)->subDays(3)->timestamp,
//                'source' => 'android',
//            ],
//            [
//                'user_id' => '2',
//                'tms' => \Carbon\Carbon::now()->subWeeks(3)->subDays(2)->timestamp,
//                'source' => 'site',
//            ],
//            [
//                'user_id' => '2',
//                'tms' => \Carbon\Carbon::now()->subWeeks(3)->subDays(1)->timestamp,
//                'source' => 'site',
//            ],
//            [
//                'user_id' => '2',
//                'tms' => \Carbon\Carbon::createFromDate(2019, 8, 30)->timestamp,
//                'source' => 'site',
//            ],
//            [
//                'user_id' => '3',
//                'tms' => \Carbon\Carbon::now()->subWeeks(3)->subDays(1)->timestamp,
//                'source' => 'iphone',
//            ],
//            [
//                'user_id' => '4',
//                'tms' => '',
//                'source' => 'site',
//            ],
        ];

        DB::table('login_source')->insert($data);
    }
}
