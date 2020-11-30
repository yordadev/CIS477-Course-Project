<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterClientTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulClientRegister()
    {
        $this->postJson('/register', [
            'name' => 'Test Client',
            'email' => 'client@user.com',
            'password' => 'password',
            'confirm_password' => 'password'
        ]);


        $this->assertDatabaseHas('users', [
            'email' => 'client@user.com',
        ]);
        
    }

}
