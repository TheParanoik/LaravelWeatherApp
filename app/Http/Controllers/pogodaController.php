<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pogodaController extends Controller
{
    public $error = FALSE;

    public function index(){

      return view('pogoda', ['message' => '', 'forecast' => '']);
    }

    public function pogoda(Request $request){

      $city = $request->city;

      //getting data from APIs // current
        $openweathermapCurrent = Http::get("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=c24f5695b3aa20d6ee849ad7c602f282&units=metric");

        $weatherapiCurrent = Http::get("http://api.weatherapi.com/v1/current.json?key=b13153e3d53e4e85973180321201510&q=".$city);


      //getting data from APIs // forecast
      $weatherapiForecast = Http::get("http://api.weatherapi.com/v1/forecast.json?key=b13153e3d53e4e85973180321201510&q=".$city."&days=3");


      // processing data // decode JSON
      $openweathermapCurrent = json_decode($openweathermapCurrent);

      $weatherapiCurrent = json_decode($weatherapiCurrent);

      $weatherapiForecast = json_decode($weatherapiForecast);

      //processing the data // current temperature
      $currentTemperature = $openweathermapCurrent->main->temp + $weatherapiCurrent->current->temp_c / 2;

      //processing the data // forecast

      if ($this->error){
        $message = "Oops! something went wrong...";
        $forecast = 0;
      }else{
      $message = "Temperature in ".$request->city.": ".$currentTemperature." Celcius";
        }
      $forecastresponse = $weatherapiForecast->forecast->forecastday;


      $forecast =  array();
      foreach ($forecastresponse as $key => $value) {
        $forecast[$key]['date'] = $forecastresponse[$key]->date;
        $forecast[$key]['avgtemp_c'] = $forecastresponse[$key]->day->mintemp_c;
        $forecast[$key]['mintemp_c'] = $forecastresponse[$key]->day->mintemp_c;
        $forecast[$key]['maxtemp_c'] = $forecastresponse[$key]->day->maxtemp_c;

      }
      unset($forecastresponse);

      $request->forecastjson = json_encode($forecast);
      $request->current_temp = $currentTemperature;
      return view('pogoda', ['message' => $message, 'forecast' => $forecast]);
    }
}
