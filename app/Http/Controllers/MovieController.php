<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class MovieController extends Controller
{
    // protected $movies = [
    //     0 => [
    //         "title" => "Jurassic Park",
    //         "awards" => 0,
    //         "genre_id" => 3,
    //         "length" => 110
    //     ],
    //     1 => [        
    //         "title" => "Terminator 2",
    //         "awards" => 0,
    //         "genre_id" => 3,
    //         "length" => 140
    //     ],
    //     2 => [
    //         "title" => "Esperando la Carroza",
    //         "awards" => 0,
    //         "genre_id" => 1,
    //         "length" => 115
    //     ],
    //     3 => [
    //         "title" => "Hackers",
    //         "awards" => 9,
    //         "genre_id" => 3,
    //         "length" => 110
    //     ]
    // ];

    public function index ()
    {
        $movies = Movie::all();
        return view('Movie.movies')->with('movies', $movies);
    }

    public function show ($id)
    {
        $movie = Movie::find($id);
        
        return view('Movie.movie')->with('movie', $movie);
        return redirect()->back();
    }

    public function create ()
    {
        return view('Movie.create');
    }

    public function store(Request $req)
    {
        //
    }

    public function search()
    {
        $trim = trim($_GET['search']);
        $search = Movie::where('title', 'LIKE', "%$trim%")
                         ->get();
        return view('Movie.movies')->with('movies', $search);
    }
}    
