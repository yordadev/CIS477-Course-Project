<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\CandidateResume;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanidateRemoveResumeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/remove',
            [
                'resume_id'  => $user->resume->resume_id,
            ]
        );

        $response->assertSessionHas('success', 'Successfully removed resume.');
    }
}
