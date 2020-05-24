<?php

namespace App\Http\Controllers;


use App\Film;
use App\Genre;
use App\Actor;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();
        $genres = Genre::all();

        if (Request()->search != null) {
          $search = Request()->search;
          $films = Film::where('name', $search)->orderBy('id', 'DESC')->paginate(12);
        }
        else {
          $films = Film::orderBy('id', 'DESC')->paginate(12);
        }


        return view('films.index', [
          'topfilms' => $topfilms,
          'randfilms' => $randfilms,
          'topside' => $topside,
          'films' => $films,
          'genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (session()->get('admin') != null) {
          $genres = Genre::all();
          $actors = Actor::all();
          return view('films.add', [
            'genres' => $genres,
            'actors' => $actors
          ]);
      }
      else {
        return redirect('/');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'country' => 'required',
            'duration' => 'required',
            'director' => 'required',
            'description' => 'required',
            'image' => 'required',
            'stars' => 'required',
            'video' => 'required'
        ]);

        $film = new Film([
            'name' => $request->get('name'),
            'year' => $request->get('year'),
            'country' => $request->get('country'),
            'duration' => $request->get('duration'),
            'director' => $request->get('director'),
            'description' => $request->get('description'),
            'image' => $request->get('image'),
            'stars' => $request->get('stars'),
            'video' => $request->get('video')
        ]);

        $film->save();
        $film->genres()->attach($request->get('genres'));
        $film->actors()->attach($request->get('actors'));
        return redirect('/')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();



        $film = Film::findOrFail($id);
        $film->increment('views');
        $genres = Genre::all();

        return view('films.show', [
            'topfilms' => $topfilms,
            'randfilms' => $randfilms,
            'topside' => $topside,
            'film' => $film,
            'genres' => $genres
        ]);
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (session()->get('admin') != null) {
          $film = Film::findOrFail($id);
          $genres = Genre::all();
          $actors = Actor::all();
          return view('films.edit', [
            'film' => $film,
            'genres' => $genres,
            'actors' => $actors
          ]);
      }
      else {
        return redirect('/');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'country' => 'required',
            'duration' => 'required',
            'director' => 'required',
            'description' => 'required',
            'image' => 'required',
            'stars' => 'required',
            'video' => 'required'
        ]);

        $film = Film::findOrFail($id);
        $film->name = $request->get('name');
        $film->year = $request->get('year');
        $film->country = $request->get('country');
        $film->duration = $request->get('duration');
        $film->director = $request->get('director');
        $film->description = $request->get('description');
        $film->image = $request->get('image');
        $film->stars = $request->get('stars');
        $film->video = $request->get('video');
        $film->genres()->attach($request->get('genres'));
        $film->actors()->attach($request->get('actors'));

        $film->save();

        return redirect('/film/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $film = Film::findOrFail($id);
        $film->comments()->delete();
        $film->delete();

        return redirect('/');
    }

    public function genre($name)
    {

        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();
        $genres = Genre::all();



        $genreId = Genre::select('id')->where('code', $name)->get();
        $films = Film::whereHas('genres', function($q) use($genreId) {
                  $q->whereIn('genre_id', $genreId);
                  })->get();

                  

        return view('films.index', [
            'topfilms' => $topfilms,
            'randfilms' => $randfilms,
            'topside' => $topside,
            'films' => $films,
            'genres' => $genres
        ]);
        //

    }

    
}
