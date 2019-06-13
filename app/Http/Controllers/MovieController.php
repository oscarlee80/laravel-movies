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
        return view('Movie.create');
    }

    public function store(Request $request)
    {

        $reglas = [
            'title' => 'required|string|max:255|unique:movies,title',
            'awards' => 'required|integer',
            'length' => 'required|integer',
            'rating' => 'required|numeric',
            'dia' => 'required|integer|max:31|min:1',
            'mes' => 'required|integer|max:12|min:1',
            'anio' => 'required|integer|digits:4'
        ];
        
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];

        $this->validate($request, $reglas, $mensaje);

        $dia = $request->input('dia');
        $mes = $request->input('mes');
        $anio = $request->input('anio');
        $date = date_create($dia . '-' . $mes . '-' . $anio);
        $release_date = date_format($date, "Y-m-d H:i:s");
        dd($date);
        $request->request->remove('dia');
        $request->request->remove('mes');
        $request->request->remove('anio');
        $request->request->remove('submit');
        $request->request->add(['release_date' => $release_date]);

        $pelicula = new Movie($request->all());

        $pelicula->save();

        return redirect('/movies');
    }

    public function search()
    {
        // $trim = trim($_GET['search']);
        // $search = Movie::where('title', 'LIKE', "%$trim%")
        //                  ->get();
        // return view('Movie.movies')->with('movies', $search);
    }
}    
