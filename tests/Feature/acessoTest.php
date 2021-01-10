<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Para que o teste não insira dados no banco, comentar essas linhasno phpunit.xml
// <server name="DB_DATABASE" value=":memory:"/>
// <server name="MAIL_MAILER" value="array"/>

class acessoTest extends TestCase
{
    /** @test */
    public function verificar_acesso_com_usuario_sem_login_ir_login(){
        $response = $this->get('/tarefas')->assertRedirect('/login');
    }
}
