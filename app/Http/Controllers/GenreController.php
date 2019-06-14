<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

use App\Movie;

class GenreController extends Controller
{

    public function index ()
    {
        $genres = Genre::all()->sortBy('name');
        return view('Genre.genres')->with('genres', $genres);
    }
    
    public function show ($id)
    {
        $genre = Genre::find($id);

        if(empty($genre->movies)) {
            return redirect()
                ->back()
                ->with('error', 'No hay peliculas de ' . $genre->name);
        }

        return view('Genre.show')->with('genre', $genre);
        
    }

    public function create ()
    {
        return view('Genre.create');
    }

    public function store(Request $request)
    {
        
        $reglas = [
            'name' => 'unique:genres|required|string|max:255',
            'ranking' => 'unique:genres|required|integer',
            'active' => 'required|integer'
        ];
        
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'unique' => 'El campo :attribute ya está registrado.'
        ];

        $this->validate($request, $reglas, $mensaje);

        $request->request->remove('submit');

        $genre = new Genre($request->all());

        $genre->save();

        return redirect('/genres');
    }
}
