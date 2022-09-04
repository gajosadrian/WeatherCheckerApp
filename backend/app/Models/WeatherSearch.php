<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherSearch extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'temperature' => 'float',
        'temperature_min' => 'float',
        'temperature_max' => 'float',
        'clouds' => 'integer',
        'wind_speed' => 'float',
        'wind_deg' => 'integer',
        'lat' => 'float',
        'lng' => 'float',
    ];
}
