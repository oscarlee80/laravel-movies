<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

use App\Movie;

class GenreController extends Controller
{
    // protected $genres = [
    //     1 => "Comedia",
    //     2 => "Accion",
    //     3 => "Ciencia Ficcion",
    //     4 => "Terror"
    // ];

    public function index ()
    {
        $genres = Genre::all();
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

    public function store(Request $req)
    {
        //
    }
}
