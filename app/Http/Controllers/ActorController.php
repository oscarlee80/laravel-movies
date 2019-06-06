<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

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
        return view('Actor.actor')->with('actor', $actor);
        
        // foreach ($actors as $actor) {
        //     if($actor['id'] == $id) {
                // return view('Actor.actor')->with('actor', $actor);
        //     }
        // }

        return redirect()->back();
    }
    
    public function create ()
    {
        return view('Actor.create');
    }

    public function store(Request $req)
    {
        //
    }

    public function search()
    {
        $trim = trim($_GET['search']);

        //Si hay espacios entre las palabras de nuestra query entra a este if
        if (strpos($trim,' ') == true) { 
            $nombre = explode(' ', $_GET['search']);
            $search = Actor::where('first_name', 'LIKE', "%$nombre[0]%")
                            ->where('last_name','LIKE', "%$nombre[1]%")
                            ->get();
            return view('Actor.actors')->with('actors', $search);
        }
        //Se ejecuta si ingresamos una sola palabra en la query
        $search = Actor::where('first_name', 'LIKE', "%$trim%") 
                        ->orwhere('last_name', 'LIKE', "%$trim%")
                        ->get();
        return view('Actor.actors')->with('actors', $search);
    }
}
