<?php

namespace App;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class TiempoApi
{
  private OpenWeatherMap $openWeatherMap;

  public function __construct()
  {
    $httpRequestFactory = new RequestFactory();
    $httpClient = GuzzleAdapter::createWithConfig([]);

    $this->openWeatherMap = new OpenWeatherMap($_SERVER['API_KEY_OWM'], $httpClient, $httpRequestFactory);
  }

  public function queTemperaturaHaceEn(string $ciudad): int
  {
    $temperatura = $this->openWeatherMap->getWeather($ciudad, 'metric');

    return $temperatura->temperature->now->getValue();
  }
}
