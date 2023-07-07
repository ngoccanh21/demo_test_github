<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //gọi đến 2 tên class seeder để chạy
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
