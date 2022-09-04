<?php

namespace App\Services;

use App\Models\WeatherSearch;

class WeatherService
{
    public function __construct(
        protected WeatherSearchService $weatherSearchService,
        protected OpenWeatherService $openWeatherService
    )
    {
        //
    }

    /**
     * @param $lat
     * @param $lng
     * @return WeatherSearch
     * @throws \Exception
     */
    public function getWeather($lat, $lng): WeatherSearch
    {
        $weatherData = $this->openWeatherService->getWeather($lat, $lng);
        $weather = collect($weatherData['weather'])->first();

        return $this->weatherSearchService->create([
            'temperature' => $weatherData['main']['temp'],
            'temperature_min' => $weatherData['main']['temp_min'],
            'temperature_max' => $weatherData['main']['temp_max'],
            'clouds' => $weatherData['clouds']['all'],
            'wind_speed' => $weatherData['wind']['speed'],
            'wind_deg' => $weatherData['wind']['deg'],
            'description' => $weather ? $weather['description'] : '',
            'weather_icon' => $weather ? $weather['icon'] : '',
            'city' => $weatherData['name'],
            'lat' => $weatherData['coord']['lat'],
            'lng' => $weatherData['coord']['lon'],
        ]);
    }
}
