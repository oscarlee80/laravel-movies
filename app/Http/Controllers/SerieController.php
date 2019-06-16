<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Serie;

use App\Genre;

class SerieController extends Controller
{
    public function index ()
    {
        $series = Serie::all()->sortBy('title');
        return view('Serie.series')->with('series', $series);
    }

    public function show ($id)
    {
        $serie = Serie::find($id);
        if(empty($serie)) {
            return redirect()
                ->back()
                ->with('error', 'No hay resultados');
        }
        return view('Serie.show')->with('serie', $serie);
    }
    
    public function create ()
    
    {
        $genres = Genre::all();
        return view('Serie.create')->with('genres', $genres);
    }

    public function store(Request $request)
    {
        $reglas = [
            'title' => 'required|string|max:255|unique:series,title',
            'release_date' => 'required',
            'end_date' => 'required'
        ];        
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $request->request->remove('submit');
        $nuevaSerie = new Serie($request->all());
        $nuevaSerie->save();
        return redirect('/series');
    }

    public function edit ($id) {

        $serie = Serie::find($id);
        $genres = Genre::all();
        if (empty($serie)) {
            return redirect("/series");
        }
        return view('Serie.edit')->with('serie', $serie)->with('genres', $genres);
    }

    public function update (Request $request, $id)
    {
        $serie = Serie::find($id);
        $reglas = [
            'title' => 'required|max:255|unique:series,title',
            'release_date' => 'required',
            'end_date' => 'required'
        ];        
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $serie = Serie::find($request->id);
        $serie->title = $request->input('title') !== $serie->title ? $request->input('title') : $serie->title;
        $serie->genre_id = $request->input('genre_id') !== $serie->genre_id ? $request->input('genre_id') : $serie->genre_id;
        $serie->release_date = $request->input('release_date') !== $serie->release_date ? $request->input('release_date') : $serie->release_date;
        $serie->end_date = $request->input('end_date') !== $serie->end_date ? $request->input('end_date') : $serie->end_date;
        $serie->save();
        return view('Serie.show')->with('serie', $serie);
    }

    public function destroy ($id)
    {
        $destroy = Serie::destroy($id);
        return redirect("/series");
    }
}
