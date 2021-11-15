<?php

use App\QueRopaOfertar;
use App\TiempoApi;
use PHPUnit\Framework\TestCase;

class QueRopaOfertarTest extends TestCase
{
  public function testDeterminaCamisetasCuandoHaceMasDe18Grados()
  {
    // $tiempoApi = new TiempoApi();
    $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    $tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(20);

    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisetas', $ropa);
  }

  public function testDeterminaAbrigosCuandoHaceMenosDe10Grados()
  {
    $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    $tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(5);

    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Abrigos', $ropa);
  }

  public function testDeterminaCamisasCuandoHaceEntre10y18Grados()
  {
    $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    $tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(15);

    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $ropa = $queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisas', $ropa);
  }

  public function testCompruebaElTiempoEnLaCiudadIndicada()
  {
    $ciudad = 'Alicante';
    $numeroAleatorio = 56;
    $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    $tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->with($ciudad)
      ->willReturn($numeroAleatorio);

    $queRopaOfertar = new QueRopaOfertar($tiempoApi);

    $queRopaOfertar->determina('Alicante');
  }
}
