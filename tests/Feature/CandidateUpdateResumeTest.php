<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\CandidateResume;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateUpdateResumeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a successful resume update.
     *
     * @return void
     */
    public function testSuccessfullyUpdateResumeForPHPCandidate()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/update',
            [
                'resume_id'  => $user->resume->resume_id,
                'name'       => 'A Test php candidate Resume',
                'location'   => 'New York City, New York.',
                'highschool' => true,
                'hs_name'    => 'Something Something Highschool',
                'undergrad'  => true,
                'ug_name'    => 'DeVry University',
                'graduate'   => false,
                'phd'        => false,
            ]
        );

        $response->assertSessionHas('success', 'Resume successfully updated.');
    }
    /**
     * Test a validation failure of missing resume id
     *
     * @return void
     */
    public function testFailureMissingResumeID()
    {
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/update',
            [
                'name'       => 'A Test php candidate Resume',
                'location'   => 'New York City, New York.',
                'highschool' => true,
                'hs_name'    => 'Something Something Highschool',
                'undergrad'  => true,
                'ug_name'    => 'DeVry University',
                'graduate'   => false,
                'phd'        => false,
            ]
        );

        $response->assertSessionHas('errors');
    }
}
