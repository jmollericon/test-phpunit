<?php

namespace App\Tests;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
  public function casosDeUso() : array
  {
    return [
      [3, 'Fizz'],
      [5, 'Buzz'],
      [15, 'FizzBuzz'],
      [1, 1]
    ];
  }

  /**
   * @dataProvider casosDeUso
   */
  public function testFizzBuzz($numeroATestear, $resultadoEsperado)
  {
    $fizzbuzz = new FizzBuzz();

    $resultado = $fizzbuzz->diNumero($numeroATestear);

    $this->assertEquals($resultadoEsperado, $resultado);
  }

}

?>