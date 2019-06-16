<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

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

        if (empty($genre)) {
            return redirect('/genres');
        }
        if (count($genre->movies) == 0 && count($genre->series) == 0) {
            return view('Genre.show')->with('error', 'No hay resultados.')->with('genre', $genre);
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

    public function edit ($id)
    {
        $genre = Genre::find($id);
        if (empty($genre)) {
            return redirect("/genres");
            }        
        return view('Genre.edit')->with('genre', $genre);
    }

    public function update (Request $request, $id)
    {
        $genre = Genre::find($id);
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
        $genre = Genre::find($request->id);
        $genre->name = $request->input('name') !== $genre->name ? $request->input('name') : $genre->name;
        $genre->ranking = $request->input('ranking') !== $genre->ranking ? $request->input('ranking') : $genre->ranking;
        $genre->active = $request->input('active') !== $genre->active ? $request->input('active') : $genre->active;
        $genre->save();        
        return view('Genre.show')->with('genre', $genre);
    }

    public function destroy ($id)
    {
        $genre = Genre::destroy($id);
        
        return redirect("/genres");
    }
}
