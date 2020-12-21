<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Place;
use App\Models\FavoritePlace;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function getPlaces()
    {
        $category = request()->get('category', false);
        $lat = request()->get('lat', false);
        $lng = request()->get('lng', false);
        
        //https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&rankby=distance&type=food&key=YOUR_API_KEY
        $client = new Client([
            'base_uri' => 'https://maps.googleapis.com/maps/api/'
        ]);

        $maps = $client->request('GET', 'place/nearbysearch/json', [
            'query' => ['location' => $lat.','.$lng,
                        'rankby' => 'distance',
                        'type' => $category,
                        'key' => 'AIzaSyB6JzoIHSnvtZs703QhK2CLOSsSGGyiIq0'
            ]
        ]);

        $maps = $maps->getBody()->getContents();

        $maps = "[" . trim($maps) . "]";

        $json = json_decode($maps);
        $array_places = array();
       
        foreach($json[0]->results as $place)
        {   
            if(!isset($place->rating))
            {
                $rating = 5;
            }               
            else
            {
                $rating = $place->rating;
            }                                            
            array_push($array_places, ['location' => $place->geometry->location,'place_id' => $place->place_id ,'name' => $place->name, 
            'icon' => 'http://maps.google.com/mapfiles/ms/icons/red-dot.png', 'rating' => $rating,
            'vicinity' => $place->vicinity
           ]);
        }
        return $array_places;

        
    }

    public function addFavorite()
    {
         $place = request()->get('place', false);
        
         $newPlace = new Place;
         $newPlace->fill($place);
         $newPlace->lat = $place['location']['lat'];
         $newPlace->lng = $place['location']['lng'];
         $newPlace->save();

         $favPlace = new FavoritePlace;
         $favPlace->user_id = Auth::user()->id;
         $favPlace->place_id = $newPlace->id;
         $favPlace->save();

         return $favPlace;
    }

    public function getFavoritePlaces()
    {
       return Place::whereHas('favorite_places', function($query)
        {
            $query->where('user_id', Auth::user()->id);
        })->get();
    }

    public function getPopularPlaces()
    {
       return Place::whereHas('favorite_places')->get();
    }
}
