<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

use App\Genre;

class MovieController extends Controller
{
    public function index ()
    {
        $movies = Movie::all()->sortBy('title');
        return view('Movie.movies')->with('movies', $movies);
    }

    public function show ($id)
    {
        $movie = Movie::find($id);
        if(empty($movie)) {
            return redirect()
                ->back()
                ->with('error', 'No hay resultados');
        }
        return view('Movie.show')->with('movie', $movie);
    }
    
    public function create ()
    {
        $genres = Genre::all();
        return view('Movie.create')->with('genres', $genres);
    }

    public function store (Request $request)
    {
        $reglas = [
            'title' => 'required|string|max:255|unique:movies,title',
            'awards' => 'required|integer',
            'length' => 'required|integer',
            'rating' => 'required|numeric',
            'release_date' => 'required'
        ];
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $request->request->remove('submit');
        $pelicula = new Movie($request->all());
        $pelicula->save();
        return redirect('/movies');
    }

    public function edit ($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all();
        if (empty($movie)) {
            return redirect("/movies");
        }
        return view('Movie.edit')->with('movie', $movie)->with('genres', $genres);
    }

    public function update (Request $request, $id)
    {
        $movie = Movie::find($id);
        $reglas = [
            'title' => 'required|string|max:255|unique:movies,title',
            'awards' => 'required|integer',
            'length' => 'required|integer',
            'rating' => 'required|numeric',
            'release_date' => 'required'
        ];
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $movie->title = $request->input('title') !== $movie->title ? $request->input('title') : $movie->title;
        $movie->rating = $request->input('rating') !== $movie->rating ? $request->input('rating') : $movie->rating;
        $movie->awards = $request->input('awards') !== $movie->awards ? $request->input('awards') : $movie->awards;
        $movie->length = $request->input('length') !== $movie->length ? $request->input('length') : $movie->length;
        $movie->genre_id = $request->input('genre_id') !== $movie->genre_id ? $request->input('genre_id') : $movie->genre_id;
        $movie->release_date = $request->input('release_date') !== $movie->release_date ? $request->input('release_date') : $movie->release_date;
        $movie->save();
        return view('Movie.show')->with('movie', $movie);
    }

    public function destroy ($id)
    {
        $movies = Movie::destroy($id);
        return redirect("/movies");
    }

}
