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

  public function testLaCuentaEsCeroSiNadieHaDichoNumero()
  {
    $fizzbuzz = new FizzBuzz();

    $this->assertEquals(0, $fizzbuzz->dimeLaCuenta());
  }

  public function testLaCuentaSeIncrementaCuandoDecimosNumeros()
  {
    $fizzbuzz = new FizzBuzz();

    $fizzbuzz->diNumero(1);
    $fizzbuzz->diNumero(2);

    $this->assertEquals(2, $fizzbuzz->dimeLaCuenta());
  }

}

?>