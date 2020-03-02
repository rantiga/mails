<?php

use Illuminate\Database\Seeder;

class UserActionsTableSeeder extends Seeder
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
                'user_id' => '2',
                'action_id' => '1',
            ],
        ];

        DB::table('user_actions')->insert($data);
    }
}
