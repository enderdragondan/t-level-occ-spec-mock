<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['latitude']) || !isset($data['longitude'])) {
    echo json_encode(["error" => "Location data not provided"]);
    exit;
}

$latitude = $data['latitude'];
$longitude = $data['longitude'];

$weather_api_url = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&hourly=temperature_2m,apparent_temperature,relative_humidity_2m,precipitation,weathercode,pressure_msl,uv_index";
$air_quality_api_url = "https://air-quality-api.open-meteo.com/v1/air-quality?latitude=$latitude&longitude=$longitude&hourly=pm10,pm2_5,nitrogen_dioxide,ozone,grass_pollen,birch_pollen,ragweed_pollen";

$weather_response = file_get_contents($weather_api_url);
$weather_data = json_decode($weather_response, true);

$air_quality_response = file_get_contents($air_quality_api_url);
$air_quality_data = json_decode($air_quality_response, true);

if ($weather_response === false || $air_quality_response === false) {
    echo json_encode(["error" => "Failed to fetch weather data"]);
    exit;
}

$hourly_weather = $weather_data['hourly'] ?? null;
$hourly_air_quality = $air_quality_data['hourly'] ?? null;

if (!$hourly_weather || !$hourly_air_quality) {
    echo json_encode(["error" => "Invalid API response"]);
    exit;
}

echo json_encode([
    "time" => $hourly_weather['time'],
    "temperature" => $hourly_weather['temperature_2m'],
    "apparent_temperature" => $hourly_weather['apparent_temperature'],
    "humidity" => $hourly_weather['relative_humidity_2m'],
    "precipitation" => $hourly_weather['precipitation'],
    "weathercode" => $hourly_weather['weathercode'],
    "pressure_msl" => $hourly_weather['pressure_msl'],
    "uv_index" => $hourly_weather['uv_index'],
    "pm10" => $hourly_air_quality['pm10'],
    "pm2_5" => $hourly_air_quality['pm2_5'],
    "nitrogen_dioxide" => $hourly_air_quality['nitrogen_dioxide'],
    "ozone" => $hourly_air_quality['ozone'],
    "grass_pollen" => $hourly_air_quality['grass_pollen'],
    "birch_pollen" => $hourly_air_quality['birch_pollen'],
    "ragweed_pollen" => $hourly_air_quality['ragweed_pollen']
]);

