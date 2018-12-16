<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class RegistrationLoginDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegistrationLogin(){
        $this->browse(function ($browser)  {
            $browser->visit('/register')
                ->type('email', 'radhikagujar9@gmail.com')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->press('Register');
        });
        $testuser = User::where('email','radhikagujar9@gmail.com')->first();
        $this->browse(function ($browser) use ($testuser)
        {
                $Token= $testuser->verifyToken;
                $browser->visit(url('user/verify', $Token))
                ->assertPathIs('/login');
        });
        $this->browse(function ($browser) use ($testuser) {
            $browser->visit('/login')
            ->type('email', $testuser->email)
            ->type('password', '123456789')
                ->press('Login')
                ->assertPathIs('/home');
        });
        $testuser->delete();
    }
}
