<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use App\Movie;

class ActorController extends Controller
{
    public function index ()
    {
        $actors = Actor::all()->sortBy('last_name');
        return view('Actor.actors')->with('actors', $actors);
    }

    public function show ($id)
    {
        $actor = Actor::find($id);
        if (empty($actor)) {
        return redirect("/actors");
        }
        return view('Actor.show')->with('actor', $actor);
    }

    public function create ()
    {
        $movies = Movie::all();
        return view('Actor.create')->with('movies', $movies);
    }

    public function store(Request $request)
    {
        $nombres = Actor::all();
        foreach ($nombres as $nombre) {
            $nombreCompleto = $nombre->getNombreCompleto();
            $nombreRecibido = $request->input('first_name')." ".$request->input('last_name');
            if ($nombreCompleto == $nombreRecibido) {
                $error = "Ese actor ya se encuentra registrado";
                return view('Actor.create')->with('error', $error)->with('movies', $movies);
            }
        }
        $reglas = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'rating' => 'required|numeric',
            'favorite_movie_id' => 'required|integer'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $request->request->remove('submit');
        $actor = new Actor($request->all());
        $actor->save();
        return redirect('/actors');
    }

    public function edit ($id)
    {
        $actor = Actor::find($id);
        $movies = Movie::all();
        if (empty($actor)) {
            return redirect("/actors");
        }
        return view('Actor.edit')->with('actor', $actor)->with('movies', $movies);
    }

    public function update (Request $request, $id)
    {
        $actor = Actor::find($id);
        $nombres = Actor::all();
        $movies = Movie::all();
        $nombreRecibido = $request->input('first_name')." ".$request->input('last_name');
        if ($nombreRecibido !== $actor->getNombreCompleto()) {
            foreach ($nombres as $nombre) {
                $nombreCompleto = $nombre->getNombreCompleto();
                if ($nombreCompleto == $nombreRecibido) {
                    $error = "Ese actor ya se encuentra registrado";
                    return view('Actor.edit')->with('error', $error)->with('movies', $movies)->with('actor', $actor);
                }
            }
        }
        $reglas = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'rating' => 'required|numeric',
            'favorite_movie_id' => 'required|integer'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $actor->first_name = $request->input('first_name') !== $actor->first_name ? $request->input('first_name') : $actor->first_name;
        $actor->last_name = $request->input('last_name') !== $actor->last_name ? $request->input('last_name') : $actor->last_name;
        $actor->rating = $request->input('rating') !== $actor->rating ? $request->input('rating') : $actor->rating;
        $actor->favorite_movie_id = $request->input('favorite_movie_id') !== $actor->favorite_movie_id ? $request->input('favorite_movie_id') : $actor->favorite_movie_id;
        $actor->save();
        return view('Actor.show')->with('actor', $actor);
    }

    public function destroy ($id)
    {
        $actor = Actor::destroy($id);
        return redirect("/actors");
    }
}
