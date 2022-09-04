<?php

namespace App\Http\Controllers;

use App\Services\WeatherSearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeatherSearchController extends Controller
{

    public function __construct(protected WeatherSearchService $weatherSearchService)
    {
        //
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $weatherSearches = $this->weatherSearchService->get([
            'perPage' => $request->get('perPage'),
        ]);

        return response()->json($weatherSearches);
    }
}
