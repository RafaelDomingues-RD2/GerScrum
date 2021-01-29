<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

// Para que o testre possar inserir dados no banco, comentar essas linhasno phpunit.xml
// <server name="DB_DATABASE" value=":memory:"/>
// <server name="MAIL_MAILER" value="array"/>

class userTest extends DuskTestCase{

    /** @test */
    public function verefica_acesso_usuario_sucesso(){
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
            ->type('email', 'rafa@gmail.com')
            ->type('password', 'mudar123')
            ->press('Login')
            ->assertPathIs('/home');
        });
    }
    /** @test */
    public function verefica_cadastro_usuario_sucesso(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Teste automatico_1')
                    ->type('email', 'test_1@email.com')
                    ->type('password', 'mudar1234')
                    ->type('password_confirmation', 'mudar1234')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
        });
    }
}
