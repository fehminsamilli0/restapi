<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
            'name' => 'Fahmin',
            'email' => 'fahmin@gmail.com',
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
