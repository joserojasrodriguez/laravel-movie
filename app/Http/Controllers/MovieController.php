<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                             ->get('http://api.themoviedb.org/3/movie/popular?language=es-ES')
                             ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
                                ->get('http://api.themoviedb.org/3/movie/now_playing?language=es-ES')
                                ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
                           ->get('http://api.themoviedb.org/3/genre/movie/list?language=es-ES')
                           ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            'popularMovies'    => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'genres'           => $genres
        ]);
    }


    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/movie/' . $id . '?language=es-ES&append_to_response=credits,videos')
            ->json();

        $images = Http::withToken(config('services.tmdb.token'))
            ->get('http://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json()['images'];

        return view('show', [
            'movie' => $movie,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
