<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\user;
use App\Mail\EmailVerificationMailable;

class EmailVerificationFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testifMailSenttoUser()
    {
        Mail::fake();
        $user  = User::create([
            'email' => 'radhikagujar13@gmail.com',
            'password' => bcrypt('123456'),
            'verifyToken' => str_random(40)
        ]);
        $user->save();
        Mail::to($user->email)->send(new EmailVerificationMailable($user));
        Mail::assertSent(EmailVerificationMailable::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
        $response = $this->get(url('user/verify', $user->verifyToken));
        $response->assertStatus(302);
        $this->assertTrue($user->delete());
    }
}
