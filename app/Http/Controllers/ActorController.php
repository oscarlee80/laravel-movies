<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use App\Movie;

use DB;

class ActorController extends Controller
{
    // protected $actors = [
    //     0 => [
    //         "name" => "Jorge Porcel",
    //         "awards" => 0,
    //         "best_movie" => null
    //     ],
    //     1 => [        
    //         "name" => "Robert Patrick",
    //         "awards" => 0,
    //         "best_movie" => "Terminator 2"
    //     ],
    //     2 => [
    //         "name" => "Sam Neill",
    //         "awards" => 1,
    //         "best_movie" => "Jurassic Park"
    //     ]
    // ];

    public function index ()
    {
        $actors = Actor::all();
        return view('Actor.actors')->with('actors', $actors);
    }

    public function show ($id)
    {
        $actor = Actor::find($id);
        
        if (empty($actor)) {
        return redirect("/actors");
        }
        
        $actorMovie = DB::table('actor_movie')->get();
 
        foreach($actorMovie as $register) {
            if ($register->actor_id == $actor->id)
            $movies[] = Movie::find($register->movie_id);
        }
        
        if (!empty($movies)) {
            return view('Actor.actor')->with('actor', $actor)->with('movies', $movies);
        }

        return view('Actor.actor')->with('actor', $actor);

    }

    public function create ()
    {
        return view('Actor.create');
    }

    public function store(Request $req)
    {
        //
    }

    public function search(Request $request)
    {
        $busqueda = $request->search;
        //Si hay espacios entre las palabras de nuestra query entra a este if
        if (strpos($busqueda,' ') == true) { 
            $nombre = explode(' ', $busqueda);
            $first_name = ucwords(strtolower($nombre[0]));
            $last_name = ucwords(strtolower($nombre[1]));
            $search = Actor::where('first_name', 'LIKE', "%$first_name%")
                            ->orwhere('last_name','LIKE', "%$last_name%")
                            ->get();
            return view('Actor.actors')->with('actors', $search);
        }
        //Se ejecuta si ingresamos una sola palabra en la query
        $search = Actor::where('first_name', 'LIKE', "%$busqueda%") 
                        ->orwhere('last_name', 'LIKE', "%$busqueda%")
                        ->get();
        return view('Actor.actors')->with('actors', $search);
    }
}
