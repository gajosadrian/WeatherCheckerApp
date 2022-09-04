<?php

namespace App\Http\Controllers;

use App\Http\Requests\Weather\GetWeatherRequest;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __construct(
        protected WeatherService $weatherService
    )
    {
        //
    }

    /**
     * @param GetWeatherRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function getWeather(GetWeatherRequest $request): JsonResponse
    {
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        $weather = $this->weatherService->getWeather($lat, $lng);

        return response()->json($weather);
    }

    public function getStats()
    {
        $stats = $this->weatherService->getStats();

        return response()->json($stats);
    }
}
