<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

use App\Actor;

use App\Serie;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $busqueda = $request->search;
        $error = "No hay resultados";
        $movies = Movie::where('title', 'LIKE', "%$busqueda%")->get();
        $series = Serie::where('title', 'LIKE', "%$busqueda%")->get();

        if (strpos($busqueda,' ') == true) { 
            $nombre = explode(' ', $busqueda);
            $first_name = ucwords(strtolower($nombre[0]));
            $last_name = ucwords(strtolower($nombre[1]));
            $actors = Actor::where('first_name', 'LIKE', "%$first_name%")
                            ->orwhere('last_name','LIKE', "%$last_name%")
                            ->get();
        } else {
            $actors = Actor::where('first_name', 'LIKE', "%$busqueda%") 
            ->orwhere('last_name', 'LIKE', "%$busqueda%")
            ->get();
        }
        
        if(count($movies) == 0 && count($actors) == 0 && count($series) == 0) {
            return view('results')->with('error', $error);
        }

        if (count($movies) > 0 && count($actors) > 0 && count($series) > 0) {
            return view('results')->with('actors', $actors)
                                  ->with('movies', $movies)
                                  ->with('series', $series);
        }
        if (count($movies) > 0 && count($actors) > 0 && count($series) == 0) {
            return view('results')->with('actors', $actors)
                                  ->with('movies', $movies);
        }
        if (count($movies) == 0 && count($actors) > 0 && count($series) > 0) {
            return view('results')->with('actors', $actors)
                                  ->with('series', $series);
        }
        if (count($movies) > 0 && count($actors) == 0 && count($series) > 0) {
            return view('results')->with('movies', $movies)
                                  ->with('series', $series);
        }
        if (count($movies) > 0 && count($actors) == 0 && count($series) == 0) {
            return view('results')->with('movies', $movies);
        }
        if (count($movies) == 0 && count($actors) > 0 && count($series) == 0) {
            return view('results')->with('actors', $actors);
        }
        if (count($movies) == 0 && count($actors) == 0 && count($series) > 0) {
            return view('results')->with('series', $series);
        }
    }
}