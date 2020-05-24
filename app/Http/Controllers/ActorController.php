<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Film;
use App\Genre;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          return view('actors.add');
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
            'rating' => 'required'
        ]);

        $actor = new Actor([
            'name' => $request->get('name'),
            'rating' => $request->get('rating')
        ]);

        $actor->save();
        return redirect('/')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $topfilms = Film::orderBy('stars', 'DESC')->limit(7)->get();
        $randfilms = Film::all()->random(6);
        $topside = Film::orderBy('stars', 'DESC')->limit(6)->get();
        $genres = Genre::all();
        $filmsAll = Film::all();


        
        $actor = Actor::findOrFail($id);

        foreach ($filmsAll as $film) {
          // code...
          $films = $film->actors->contains($actor->id);
        }


        return view('actors.show', [
          'topfilms' => $topfilms,
          'randfilms' => $randfilms,
          'topside' => $topside,
          'films' => $films,
            'actor' => $actor,
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
