<?php

namespace Database\Seeders;

use App\Models\Job;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function($user){
            $user->jobs()->save(Job::factory()->make());
        });
    }
}
