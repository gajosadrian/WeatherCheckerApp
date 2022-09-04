<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_searches', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('temperature')->nullable();
            $table->unsignedDouble('temperature_min')->nullable();
            $table->unsignedDouble('temperature_max')->nullable();
            $table->unsignedSmallInteger('clouds')->nullable();
            $table->unsignedDouble('wind_speed')->nullable();
            $table->smallInteger('wind_deg')->nullable();
            $table->string('description', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('weather_icon', 15)->nullable();
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_searches');
    }
};
