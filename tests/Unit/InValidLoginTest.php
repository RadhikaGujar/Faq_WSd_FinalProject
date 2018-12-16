<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\user;
use App\Mail\EmailVerificationMailable;

class InValidLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testtoCheckwhenUserEntersWrongDetails()
    {
        $user = factory(\App\User::class)->create([
            'password' => bcrypt('967391'),
        ]);
        $response = $this->from('/login')->post('/login',
            [
            'email' => $user->email,
            'password' => 'random',
            ]);
        $response->assertRedirect('/login');

    }
}
