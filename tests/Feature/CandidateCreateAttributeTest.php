<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\CandidateResume;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateCreateAttributeTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfullCreateAttribute()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/attribute/create',
            [
                'attribute'        => 'Visual Studio Code'
            ]
        );

        $response->assertSessionHas('success', 'Attribute successfully created.');
    }

    public function testFailureDuplicate()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/attribute/create',
            [
                'attribute'        => 'mysql'
            ]
        );

        $response->assertSessionHas('errors');
    }
}
