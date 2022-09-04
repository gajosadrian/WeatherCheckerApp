<?php

namespace App\Services;

use App\Models\WeatherSearch;

class WeatherSearchService
{
    public function get(array $params = [])
    {
        $params += [
            'perPage' => 0,
        ];

        return WeatherSearch::query()
            ->latest()
            ->when(empty($params['perPage']), fn ($q) => $q
                ->get()
            )
            ->when(!empty($params['perPage']), fn ($q) => $q
                ->limit($params['perPage'])
                ->paginate()
            );
    }

    public function create($payload): WeatherSearch
    {
        /** @var WeatherSearch $weatherSearch */
        $weatherSearch = WeatherSearch::query()->create([
            'temperature' => $payload['temperature'],
            'temperature_min' => $payload['temperature_min'],
            'temperature_max' => $payload['temperature_max'],
            'clouds' => $payload['clouds'],
            'wind_speed' => $payload['wind_speed'],
            'wind_deg' => $payload['wind_deg'],
            'description' => $payload['description'],
            'weather_icon' => $payload['weather_icon'],
            'city' => $payload['city'],
            'lat' => $payload['lat'],
            'lng' => $payload['lng'],
        ]);

        return $weatherSearch;
    }
}
