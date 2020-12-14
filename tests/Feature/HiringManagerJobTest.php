<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HiringManagerJobTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfulCreateJobListing()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);

        $user = User::where('email', 'hiringmanager@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/hiring/job/create',
            [
                'title'  => 'Software Engineer',
                'location' => 'Remote, United States',
                'minimum_education' => 'ug',
                'description' => 'This is a job description.',
                'attribute'   => [
                    'php', 'mysql', 'python'
                ]
            ]
        );

        $response->assertSessionHas('success', 'Successfully created the job in the system.');
    }

    public function testSuccessfulFailureDuplicateListing()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);

        $user = User::where('email', 'hiringmanager@user.com')->first();

        $this->actingAs($user, 'web')->post(
            '/hiring/job/create',
            [
                'title'  => 'Software Engineer',
                'location' => 'Remote, United States',
                'minimum_education' => 'ug',
                'description' => 'This is a job description.',
                'attribute'   => [
                    'php', 'mysql', 'python'
                ]
            ]
        );

        $response = $this->actingAs($user, 'web')->post(
            '/hiring/job/create',
            [
                'title'  => 'Software Engineer',
                'location' => 'Remote, United States',
                'minimum_education' => 'ug',
                'description' => 'This is a job description.',
                'attribute'   => [
                    'php', 'mysql', 'python'
                ]
            ]
        );

        $response->assertSessionHas('errors');
    }
}
