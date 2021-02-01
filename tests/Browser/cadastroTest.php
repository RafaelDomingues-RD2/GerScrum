<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;
use Faker\Provider\DateTime;

// Comentar essas linhas em phpunit.xml
// <server name="DB_DATABASE" value=":memory:"/>
// <server name="MAIL_MAILER" value="array"/>

class userTest extends DuskTestCase{

    /** @test */
    public function cadastra_usuario_sucesso(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Marvin')
                    ->type('email', 'test@gmail.com')
                    ->type('password', 'mudar1234')
                    ->type('password_confirmation', 'mudar1234')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
        });
    }

     /** @test */
    public function cadastra_categoria_sucesso(){
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                    ->type('email', 'test@gmail.com')
                    ->type('password', 'mudar1234')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->visit('/categorias/create')
                    ->assertPathIs('/categorias/create')
                    ->type('name', 'Teste automatico')
                    ->type('descricao', 'Testando')
                    ->press('Criar Categoria')
                    ->assertPathIs('/categorias')
                    ->assertSee('Categoria cadastrada com Sucesso');
        });
    }

    /** @test */
    public function cadastra_tarefa_sucesso(){
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                    ->type('email', 'test@gmail.com')
                    ->type('password', 'mudar1234')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->visit('/tarefas/create')
                    ->type('name', 'Teste Automatico')
                    ->select('usuario')
                    ->select('categoria')
                    ->type('descricao', 'Criado por teste automatico')
                    ->press('Criar Tarefa')
                    ->assertPathIs('/tarefas')
                    ->assertSee('Tarefa cadastrada com Sucesso');

        });
    }
}
