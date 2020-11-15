<?php

namespace Database\Seeders;

use Database\Seeders\DemoUser;
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
        $this->call([
            DemoUser::class,
        ]);
    }
}
