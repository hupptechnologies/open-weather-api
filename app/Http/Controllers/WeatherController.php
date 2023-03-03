<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
	public function index()
	{
		return view('template');
	}

	public function forecastWeather(Request $request)
	{
		$lat = request()->lat;
		$lon = request()->lng;
		$app_endpoint = config("openweather.endpoint");
		$app_key = config("openweather.key");
		$url = "{$app_endpoint}?lat={$lat}&lon={$lon}&units=metric&appid={$app_key}";
		$client = new \GuzzleHttp\Client();
		$res = $client->get($url);
		if ($res->getStatusCode() == 200) {
			$j = $res->getBody();
			$forecast = json_decode($j);
		}
		$html = view('forecast', compact('forecast'))->render();
		return $html;
	}
}
