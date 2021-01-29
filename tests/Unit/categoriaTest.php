<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use \App\Models\Categoria;

class categoriaTest extends TestCase{
    /** @test */
    public function verefica_coluna_categoria_correto(){
        $categoria = new Categoria;

       $expected = [
            'name',
            'descricao'
       ];

       $arrayCompared = array_diff($expected, $categoria->getFillable());

       $this->assertEquals(0, count($arrayCompared));
    }
}
