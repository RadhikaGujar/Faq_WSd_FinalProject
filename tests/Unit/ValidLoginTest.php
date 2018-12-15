<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\user;
use App\Mail\EmailVerificationMailable;

class ValidLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testtoCheckIfUserEntersCorrectDetails()
    {
        $user = factory(\App\User::class)->create([
            'password' => bcrypt($password = '967391'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
    }
}
