<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Models\User;
use Illuminate\Http\Request;

class favouriteController extends Controller
{
    public function add($id, $location_id){
        $user = User::getCurrentUser();

        $favourite = new Favourites();
        $favourite->user_id = $user->id;
        $favourite->location = $location_id;
        $favourite->save();
    }

    public function delete($location_id){
        $user = User::getCurrentUser();

        $favourite = Favourites::where('user_id', $user->id)->where('location', $location_id)->first();
        $favourite->delete();
    }
}
