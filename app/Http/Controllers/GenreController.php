<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genres = [
        1 => "Comedia",
        2 => "Accion",
        3 => "Ciencia Ficcion",
        4 => "Terror"
    ];

    public function index ()
    {
        $genres = $this->genres;
        return view('Genre.index')->with('genres', $genres);
    }
    
    public function show ($id)
    {
        $genres = $this->genres;
        foreach ($genres as $key => $genre) {
            if($key == $id) {
                return view('Genre.show')->with('genre', $genre);
            }
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
