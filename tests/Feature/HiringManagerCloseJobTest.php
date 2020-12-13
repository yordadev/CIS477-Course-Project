<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Job;
use App\Models\User;
use Database\Seeders\JobSeed;
use Database\Seeders\DemoUser;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HiringManagerCloseJobTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfulCloseJobListing()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(JobSeed::class);

        $user = User::where('email', 'hiringmanager@user.com')->first();
        $job = Job::where('posted_by', $user->id)->first();

        $response = $this->actingAs($user, 'web')->post(
            '/hiring/job/close',
            [
                'job_id' => $job->job_id
            ]
        );
        
        $response->assertSessionHas('success', 'Successfully closed the job.');
    }

    public function testSuccessfulFailureCloseAlreadyClosed()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(JobSeed::class);

        $user = User::where('email', 'hiringmanager@user.com')->first();
        $job = Job::where('posted_by', $user->id)->first();

        $this->actingAs($user, 'web')->post(
            '/hiring/job/close',
            [
                'job_id' => $job->job_id
            ]
        );

        $response = $this->actingAs($user, 'web')->post(
            '/hiring/job/close',
            [
                'job_id' => $job->job_id
            ]
        );

        $response->assertSessionHas('errors');
    }

    public function testSuccessfulFailureMissingJobID()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(JobSeed::class);

        $user = User::where('email', 'hiringmanager@user.com')->first();
        $job = Job::where('posted_by', $user->id)->first();

        $response = $this->actingAs($user, 'web')->post(
            '/hiring/job/close',
            []
        );

        $response->assertSessionHas('errors');
    }
}
