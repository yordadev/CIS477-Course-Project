<?php

namespace Tests\Feature;

use App\Models\ResumeAttribute;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\CandidateResume;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateUpdateAttributeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a successful resume attributes update.
     *
     * @return void
     */
    public function testSuccessfullyUpdateAttribute()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $attribute = ResumeAttribute::where([
            'resume_id' => $user->resume->resume_id,
            'name' => 'javascript'
        ])->first();        
        
        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/attribute/update',
            [
                'attribute_id' => $attribute->attribute_id,
                'value'        => 'nodejs'
            ]
        );

        $response->assertSessionHas('success', 'Resume attribute successfully updated.');
    }
    /**
     * Test a validation failure of missing attribute name value
     *
     * @return void
     */
    public function testFailureMissingAttributeValue()
    {
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);
        $this->seed(CandidateResume::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $attribute = ResumeAttribute::where([
            'resume_id' => $user->resume->resume_id,
            'name' => 'javascript'
        ])->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume/attribute/update',
            [
                'attribute_id' => $attribute->attribute_id,
            ]
        );

        $response->assertSessionHas('errors');
    }
}
