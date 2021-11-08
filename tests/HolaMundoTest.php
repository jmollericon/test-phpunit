<?php

namespace App\Tests;

use App\HolaMundo;
use PHPUnit\Framework\TestCase;

class HolaMundoTest extends TestCase
{
  public function testDiceHolaMundoCunadoSaluda()
  {
    $holamundo = new HolaMundo();

    $this->assertEquals('Hola mundo', $holamundo->saluda());
  }
}

?>