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
                ->type('email', 'rg583@njit.edu')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->press('Register');
        });

        $testuser = User::where('email','rg583@njit.edu')->first();
        $this->browse(function ($browser) use ($testuser)
        {
                $Token= $testuser->verifyToken;
                $browser->visit(url('user/verify', $Token))
                ->assertPathIs('/login');
        });
        $testuser->delete();
    }
}
