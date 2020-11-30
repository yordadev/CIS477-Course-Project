<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DemoUser;
use Database\Seeders\PermissionGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateCreateResumeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test a successful candidate resume submition with undergrad
     *
     * @return void
     */
    public function testSubmitPHPResumeSuccess()
    {
        // seed
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);

        $user = User::where('email', 'candidate1@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume',
            [
                'name'       => 'A Test php candidate Resume',
                'location'   => 'Remote',
                'highschool' => true,
                'hs_name'    => 'Something Something Highschool',
                'undergrad'  => true,
                'ug_name'    => 'DeVry University',
                'graduate'   => false,
                'phd'        => false,
                'attributes' => [
                    ['name' => 'php'],
                    ['name' => 'mysql'],
                    ['name' => 'javascript'],
                    ['name' => 'css'],
                ]
            ]
        );

        $response->assertSessionHas('success', 'Successfully submitted the resume.');
    }

    /**
     * Test a successful candidate resume submition with graduate
     *
     * @return void
     */
    public function testSubmitPythonResumeSuccess()
    {
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);

        $user = User::where('email', 'candidate2@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume',
            [
                'name' => 'A Test Python candidate Resume',
                'location' => 'Remote',
                'highschool' => true,
                'hs_name' => 'Something Something Highschool',
                'undergrad' => true,
                'ug_name'   => 'DeVry University',
                'graduate'  => true,
                'g_name'    => 'Kellar University',
                'phd'       => false,
                'attributes' => [
                    ['name' => 'python'],
                    ['name' => 'mysql'],
                    ['name' => 'javascript'],
                    ['name' => 'css'],
                ]
            ]
        );

        $response->assertSessionHas('success', 'Successfully submitted the resume.');
    }

    /**
     * Test a failure condition - missing required location
     *
     * @return void
     */
    public function testSubmitFailureValidationMissingLocation()
    {
        $this->seed(PermissionGenerator::class);
        $this->seed(DemoUser::class);

        $user = User::where('email', 'candidate2@user.com')->first();

        $response = $this->actingAs($user, 'web')->post(
            '/candidate/resume',
            [
                'name' => 'A Test Python candidate Resume',
                'highschool' => true,
                'hs_name' => 'Something Something Highschool',
                'undergrad' => true,
                'ug_name'   => 'DeVry University',
                'graduate'  => true,
                'g_name'    => 'Kellar University',
                'phd'       => false,
                'attributes' => [
                    ['name' => 'python'],
                    ['name' => 'mysql'],
                    ['name' => 'javascript'],
                    ['name' => 'css'],
                ]
            ]
        );

        $response->assertSessionHas('errors');
    }
}
