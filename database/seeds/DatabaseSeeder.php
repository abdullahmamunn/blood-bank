<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();

        Admin::truncate();
        Admin::insert(
            [
                [
                    'name'=>'Admin',
                    'email'=>'admin@admin.com',
                    'password' => bcrypt('12345678'),
                    'remember_token' => str_random(10),
                    'created_at' => $time,
                ],
            ]
        );
    }
}
