<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use \App\Models\User;

// Para que o teste não insira dados no banco, comentar essas linhasno phpunit.xml
// <server name="DB_DATABASE" value=":memory:"/>
// <server name="MAIL_MAILER" value="array"/>

class userTest extends TestCase{
    /** @test */
    public function verificar_se_colunas_user_correto(){
        $user = new User;

        $expected = [
            'name',
            'email',
            'password'
        ];

        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
