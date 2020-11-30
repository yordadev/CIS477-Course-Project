<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Resume;
use App\Models\ResumeAttribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateResume extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PHP CANDIDATE DEMO TEST DATA
        $user = User::where('email', 'candidate1@user.com')->first();

        $resume_id = Resume::generateResumeID();

        DB::table('resumes')->insert([
            'user_id' => $user->id,
            'resume_id' => $resume_id,
            'name' => 'PHP Candidate Resume',
            'location'   => 'Remote, United States',
            'highschool' => true,
            'hs_name'    => 'Back Alley South Highschool',
            'undergrad'  => true,
            'ug_name'    => 'DeVry University',
            'graduate'   => false,
            'phd'        => false,
            'created_at' => '2020-11-30 22:02:02',
            'updated_at' => '2020-11-30 22:02:02'
        ]);

        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'php'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'mysql'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'javascript'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'css'
        ]);


        // PYTHON CANDIDATE DEMO TEST DATA
        $user = User::where('email', 'candidate2@user.com')->first();

        $resume_id = Resume::generateResumeID();

        DB::table('resumes')->insert([
            'user_id' => $user->id,
            'resume_id' => $resume_id,
            'name' => 'Python Candidate Resume',
            'location'   => 'Remote, United States',
            'highschool' => true,
            'hs_name'    => 'Back Alley North Highschool',
            'undergrad'  => true,
            'ug_name'    => 'DeVry University',
            'graduate'   => true,
            'g_name'     => 'Kellar University',
            'phd'        => false,
            'created_at' => '2020-11-30 22:02:02',
            'updated_at' => '2020-11-30 22:02:02'
        ]);

        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'python'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'mysql'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'javascript'
        ]);


        DB::table('resume_attributes')->insert([
            'resume_id' => $resume_id,
            'attribute_id' => ResumeAttribute::generateAttributeID(),
            'name' => 'css'
        ]);
    }
}
