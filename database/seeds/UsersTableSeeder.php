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
        $data = [
            [
                'first_name' => 'Иван',
                'middle_name' => '',
                'second_name' => '',
                'email' => 'ivan@onion.bet',
            ],
            [
                'first_name' => 'Олег',
                'middle_name' => 'Олегович',
                'second_name' => 'Петров',
                'email' => 'oleg@gmail.com',
            ],
            [
                'first_name' => 'Константин',
                'middle_name' => '',
                'second_name' => 'Леонов',
                'email' => 'konstantin@gmail.com',
            ],
            [
                'first_name' => 'Петя',
                'middle_name' => '',
                'second_name' => 'Петров',
                'email' => 'petya@gmail.com',
            ]
        ];

        DB::table('users')->insert($data);
    }
}
