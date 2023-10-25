<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Adrianorosa\GeoLocation\GeoLocation;

class RestaurantController extends Controller
{
    public function searchedRestaurants()
    {
        $restaurants = DB::table('restaurant_search_query')->orderByDesc('created_at')->get();
        return view('searched-restaurants', compact('restaurants'));
    }

    public function restaurants()
    {
        $restaurants = Restaurant::all();
        return view('restaurants', compact('restaurants'));
    }

    public function searchRestaurant(Request $request)
    {
        $ip = \request()->ip();
        $details = GeoLocation::lookup($ip);
        $latitude = $details->getLatitude();
        $longitude = $details->getLongitude();
        $range = 2.0;
        $request->validate([
            'restaurant' => 'required'
        ]);

        DB::table('restaurant_search_query')->insert([
            'name' => $request->restaurant,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $restaurants =Restaurant::all();
        $restaurantDistances = [];
        foreach ($restaurants as $restaurant)
        {
            $lat = $restaurant->latitude;
            $lon = $restaurant->longitude;
            $distance = $this->haversineDistance($latitude, $longitude,$lat,$lon);
            $restaurantDistances[$restaurant->id] = $distance;
        }
        asort($restaurantDistances);

        // Create a new sorted collection of restaurants
        $sortedRestaurants = collect();
        foreach ($restaurantDistances as $key => $distance) {
            $sortedRestaurants->push($restaurants->find($key));
        }


        if ($restaurants->isEmpty()) {
            return back()->with('error', 'No restaurants found.');
        }


        return view('searchedRestaurants', compact('sortedRestaurants'));
    }

    function haversineDistance($lat1, $lon1, $lat2, $lon2) {
        // Convert latitude and longitude from degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Radius of the Earth in kilometers (mean value)
        $earthRadius = 6371;

        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat/2) * sin($dlat/2) + cos($lat1) * cos($lat2) * sin($dlon/2) * sin($dlon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Distance in kilometers
        $distance = $earthRadius * $c;

        return $distance;
    }

}
