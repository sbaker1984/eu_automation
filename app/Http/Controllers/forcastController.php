<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Models\User;
use Illuminate\Http\Request;
use Adrianorosa\GeoLocation\GeoLocation;

class forcastController extends Controller
{

    public function __invoke(){

    }

    public function index($id){
        $user = User::getCurrentUser();

        $location = GeoLocation::lookup('8.8.8.8');
        $city = $location->getCity();

        $url = '/locations/v1/cities/search?apikey='. env('ACCU_WEATHER_API_KEY') . '=' .$city;
        $locations = file_get_contents($url);
        $favourites = Favourites::where('user_id', $user->id)->get();

        $myFavourites = [];
        foreach($favourites as $favourite){
            $myFavourites = 'http://dataservice.accuweather.com/forecasts/v1/daily/5day/'. $favourite->location;
        }

        return view('user.home')->with('locations', $locations)->with('favourites', $myFavourites)->with('user', $user);
    }

    public function showAll(){
        $url = 'http://dataservice.accuweather.com/locations/v1/topcities/50?apikey=' . env('ACCU_WEATHER_API_KEY');
        $json = json_decode(file_get_contents($url));

        return view('locations.top')->with('locations', $json);
    }

    public function fiveDayForecast($location_key){
        $url = 'http://dataservice.accuweather.com/forecasts/v1/daily/5day/'. $location_key . '?apikey=' . env('accu_weather_api_key');

        $json = json_decode(file_get_contents($url));

        return view('forecasts.forecast')->with('forecast', $json);
    }
}
