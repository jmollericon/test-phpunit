<?php

namespace App\Tests;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
  public function testCuandoLeDoyNumeroTresRetornaFizz() : void
  {
    $fizzbuzz = new FizzBuzz();

    $resultado = $fizzbuzz->diNumero(3);

    $this->assertEquals('Fizz', $resultado);
  }

  public function testCuandoLeDoyNumeroCincoRetornaBuzz() : void
  {
    $fizzbuzz = new FizzBuzz();

    $resultado = $fizzbuzz->diNumero(5);

    $this->assertEquals('Buzz', $resultado);
  }

  public function testCuandoLeDoyNumeroQuinceRetornaFizzBuzz() : void
  {
    $fizzbuzz = new FizzBuzz();

    $resultado = $fizzbuzz->diNumero(15);

    $this->assertEquals('FizzBuzz', $resultado);
  }

  public function testCuandoLeDoyNumeroUnoRetornaUno() : void
  {
    $fizzbuzz = new FizzBuzz();

    $resultado = $fizzbuzz->diNumero(1);

    $this->assertEquals(1, $resultado);
  }

}

?>