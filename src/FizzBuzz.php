<?php

namespace App;

class FizzBuzz
{
  private int $cuenta = 0;

  public function dimeLaCuenta(): int
  {
    return $this->cuenta;
  }

  public function diNumero(int $numero): string
  {
    ++$this->cuenta;

    if ($numero % 3 == 0 && $numero % 5 == 0) {
      return 'FizzBuzz';
    }

    if ($numero % 3 == 0) {
      return 'Fizz';
    }

    if ($numero % 5 == 0) {
      return 'Buzz';
    }

    return $numero;
  }

}

?>
