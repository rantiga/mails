<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
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
                'title' => 'Акция августа',
                'date_start' => '2019-08-28',
                'date_end' => '2019-09-05',
            ],
            [
                'title' => 'Акция перед весной',
                'date_start' => '2020-02-25',
                'date_end' => '2020-03-15',
            ],
        ];

        DB::table('actions')->insert($data);
    }
}
