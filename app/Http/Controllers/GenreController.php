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
        $movies = Movie::where('genre_id', $id)->get();
        $genre = Genre::find($id);
        if (!empty($genre)) {
        return view('Genre.genre')->with('genre', $genre)->with('movies', $movies);
        }
        return redirect()->back();
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
