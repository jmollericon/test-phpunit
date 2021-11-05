<?php

use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase
{
  private $op;

  public function setUp(): void
  {
    $this->op = new Operations();
  }

  public function testSumWithTwoValues()
  {
    $this->assertEquals(7, $this->op->sum(3, 4));
  }

  public function testSumWithNullValues()
  {
    $this->expectException(InvalidArgumentException::class);
    $this->op->sum(NULL, NULL);
  }

  public function testSumWithNotNumericValues()
  {
    $this->expectException(InvalidArgumentException::class);
    $this->op->sum('b', 'a');
  }

  public function testDivideWithTwoValues()
  {
    $this->assertEquals(1, $this->op->div(5, 5));
  }

  public function testDivideWithNullValues()
  {
    $this->expectException(InvalidArgumentException::class);
    $this->op->div(NULL, NULL);
  }

  public function testDivideWithNotNumericValues()
  {
    $this->expectException(InvalidArgumentException::class);
    $this->op->div('b', 'a');
  }

  public function testDivideBetweenZero()
  {
    $this->expectException(DivisionByZeroError::class);
    $this->op->div(5, 0);
  }

}

?>