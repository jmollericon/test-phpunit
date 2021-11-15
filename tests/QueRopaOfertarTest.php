<?php

use App\QueRopaOfertar;
use App\TiempoApi;
use PHPUnit\Framework\TestCase;

class QueRopaOfertarTest extends TestCase
{
  public function testDeterminaCamisetasCuandoHaceMasDe18Grados()
  {
    $tiempoApi = new TiempoApi();

    // $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    // $tiempoApi->expects()

    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisetas', $ropa);
  }

  public function testDeterminaAbrigosCuandoHaceMenosDe10Grados()
  {
    $tiempoApi = new TiempoApi();
    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Abrigos', $ropa);
  }

  public function testDeterminaCamisasCuandoHaceEntre10y18Grados()
  {
    $tiempoApi = new TiempoApi();
    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisas', $ropa);
  }
}
