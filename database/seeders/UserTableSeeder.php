<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = env('DEV_TEST_USER_FIRST_NAME', 'Testy');
        $user->last_name = env('DEV_TEST_USER_LAST_NAME', 'McTesterson');
        $user->email = env('DEV_TEST_USER_EMAIL', 'testy@test.com');
        $user->password = Hash::make(env('DEV_TEST_USER_PASSWORD', 'Ch@ng3m3'));
        $user->user_level = env('DEV_TEST_USER_LEVEL', User::LEVEL_REGISTERED);
        $user->save();
    }
}
