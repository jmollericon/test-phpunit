<?php

use App\QueRopaOfertar;
use App\TiempoApi;
use PHPUnit\Framework\TestCase;

class QueRopaOfertarTest extends TestCase
{
  private TiempoApi $tiempoApi;
  private QueRopaOfertar $queRopaOfertar;

  public function setUp(): void
  {
    parent::setUp();
    $this->tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();
    $this->queRopaOfertar = new QueRopaOfertar($this->tiempoApi);
  }

  public function testDeterminaCamisetasCuandoHaceMasDe18Grados()
  {
    // $tiempoApi = new TiempoApi();
    $this->tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(20);

    $ropa = $this->queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisetas', $ropa);
  }

  public function testDeterminaAbrigosCuandoHaceMenosDe10Grados()
  {
    $this->tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(5);

    $ropa = $this->queRopaOfertar->determina('Alicante');

    $this->assertEquals('Abrigos', $ropa);
  }

  public function testDeterminaCamisasCuandoHaceEntre10y18Grados()
  {
    $this->tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->willReturn(15);

    $ropa = $this->queRopaOfertar->determina('Alicante');

    $this->assertEquals('Camisas', $ropa);
  }

  public function testCompruebaElTiempoEnLaCiudadIndicada()
  {
    $ciudad = 'Alicante';
    $numeroAleatorio = 56;
    $this->tiempoApi->expects($this->once())
      ->method('queTemperaturaHaceEn')
      ->with($ciudad)
      ->willReturn($numeroAleatorio);

    $this->queRopaOfertar->determina('Alicante');
  }

  public function testLanzaUnaExcepcionSiLaCiudadEstaVacia()
  {
    $this->expectException(\exception::class);

    $this->queRopaOfertar->determina('');
  }
}
