<?php

namespace App\Services;

use App\Models\WeatherSearch;
use Illuminate\Support\Facades\Http;

class OpenWeatherService
{
    public const BASE_URL = 'https://api.openweathermap.org/data/2.5/';

    /**
     * @param $lat
     * @param $lng
     * @return array
     * @throws \Exception
     */
    public function getWeather($lat, $lng): array
    {
        $res = Http::get(static::BASE_URL . '/weather', [
            'lat' => $lat,
            'lon' => $lng,
            'units' => 'metric',
            'lang' => config('app.locale'),
            'appid' => config('openweather.appId'),
        ]);

        if ($res->failed()) {
            throw new \Exception('Failed to connect to the' . static::BASE_URL);
        }

        return $res->json();
    }
}
