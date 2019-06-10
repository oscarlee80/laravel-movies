<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use App\Movie;

use DB;

class ActorController extends Controller
{
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

    public function store(Request $request)
    {
        $nombres = Actor::all();

        foreach ($nombres as $nombre) {
            $nombreCompleto = $nombre->getNombreCompleto();
            $nombreRecibido = $request->input('first_name')." ".$request->input('last_name');
            if ($nombreCompleto == $nombreRecibido) {
                $error = "Ese actor ya se encuentra registrado";
                return view('Actor.create')->with('error', $error);
            }
        } 

        $reglas = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'rating' => 'required|numeric'
        ];
        
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];

        $this->validate($request, $reglas, $mensaje);

        $request->request->remove('submit');
        $request->request->remove('favorite_movie_id');

        $actor = new Actor($request->all());

        $actor->save();

        return redirect('/actors');
        
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
    
    public function edit ($id) {

        $actor = Actor::find($id);

        if (empty($actor)) {
            return redirect("/actors");
            }
        
        return view('Actor.edit')->with('actor', $actor);
    }

    public function update (Request $request) {

        $actor = Actor::find($request->id);
        
        $actor->first_name = $request->input('first_name');
        $actor->last_name = $request->input('last_name');
        $actor->rating = $request->input('rating');
        $actor->save();
        
        return view('Actor.actor')->with('actor', $actor);
    }

    public function destroy ($id) {
        
        $actor = Actor::destroy($id);
        
        return redirect("/actors");
    }
}
