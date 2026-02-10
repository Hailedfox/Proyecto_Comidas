<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Importante para hacer peticiones API

class ApiController extends Controller
{
    public function index()
    {
      
        $ip = request()->ip();
        if ($ip == '127.0.0.1' || $ip == '::1') {
            $ip = '201.161.63.78'; 
        }
        

        $geoResponse = Http::get("http://ip-api.com/json/" . $ip);
        $geoData = $geoResponse->json();

        $lat = $geoData['lat'] ?? 20.66; 
        $lon = $geoData['lon'] ?? -103.39;

        $weatherResponse = Http::get("https://api.open-meteo.com/v1/forecast", [
            'latitude' => $lat,
            'longitude' => $lon,
            'current_weather' => true, // Pedimos el clima actual
            'timezone' => 'auto'
        ]);
        $weatherData = $weatherResponse->json();


        $currencyResponse = Http::get("https://api.frankfurter.app/latest", [
            'from' => 'USD',
            'to' => 'MXN'
        ]);
        $currencyData = $currencyResponse->json();

        
        return view('Proyecto.Bienvenida', compact('geoData', 'weatherData', 'currencyData'));
    }
}