<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Film;
use App\Genre;
use App\Favorite;
use App\User;

class FavoriteController extends Controller
{
    public function favoriteAdd($film_id, $user_id) {

        $favorites = Favorite::where('film_id', $film_id)->where('user_id', $user_id)->first();
  
        if (empty($favorites)) {

            $playlists = Favorite::distinct()->where('user_id', $user_id)->get(['playlist']);

          return view('films.favorites.add', [
              'film_id' => $film_id,
              'user_id' => $user_id,
              'playlists' => $playlists
          ]);
  
        }
        else {
          $favorites->delete();
          return redirect('/favorites')->with('success', 'Favorite deleted!');
        }
  
      }

      public function favoritePostAdd(Request $request, $film_id, $user_id) {
        $request->validate([
            'playlist'=>'required'
        ]);

        $favorite = new Favorite();

        $favorite->playlist = $request->get('playlist');
        $favorite->film_id = $film_id;
        $favorite->user_id = $user_id;
        $favorite->save();

        return redirect('/favorites'.'/'.$request->get('playlist'))->with('success', 'Favorite added!');
          
      }
  
      public function favoriteGet($playlist) {
        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();
        $genres = Genre::all();
        $user = User::find(Auth::id());
  
        $films = Film::whereHas('favorites', function($q) use($user, $playlist){
            $q->where('playlist', $playlist)->where('user_id',$user->id);
        })->get();

  
        return view('films.index', [
          'topfilms' => $topfilms,
          'randfilms' => $randfilms,
          'topside' => $topside,
          'films' => $films,
          'genres' => $genres
        ]);
      }

      public function playlist() {
        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();
        $genres = Genre::all();

        $user = User::find(Auth::id());

        $favorites = Favorite::distinct()->where('user_id', $user->id)->get(['playlist']);
          return view('films.favorites.show', [
            'topfilms' => $topfilms,
            'randfilms' => $randfilms,
            'topside' => $topside,
            'favorites' => $favorites,
            'genres' => $genres,
            'user' => $user
          ]);
      }
}
