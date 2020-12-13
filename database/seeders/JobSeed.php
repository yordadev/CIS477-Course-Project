<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_id = uniqid() . 'seed';

        $user = User::where('email', 'hiringmanager@user.com')->first();

        DB::table('jobs')->insert([
            'posted_by' => $user->id,
            'job_id' => $job_id,
            'title' => 'Software Engineer',
            'minimum_education' => 'ug',
            'location' => 'remote, united states',
            'description' => 'this is a description for this job.',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);

        DB::table('job_attributes')->insert([
            'job_id' => $job_id,
            'attribute_id' => uniqid() . 'seed',
            'name' => 'php',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);

        DB::table('job_attributes')->insert([
            'job_id' => $job_id,
            'attribute_id' => uniqid() . 'seed',
            'name' => 'mysql',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);

        DB::table('job_attributes')->insert([
            'job_id' => $job_id,
            'attribute_id' => uniqid() . 'seed',
            'name' => 'python',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);
    }
}
