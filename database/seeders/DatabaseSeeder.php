<?php

namespace Database\Seeders;

use Database\Seeders\DemoUser;
use Illuminate\Database\Seeder;
use Database\Seeders\PermissionGenerator;

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
            PermissionGenerator::class
        ]);
    }
}
