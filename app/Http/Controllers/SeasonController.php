<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Season;

use App\Serie;

class SeasonController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $series = Serie::all();
        return view('Season.create')->with('series', $series);
    }

    public function store(Request $request)
    {
        $reglas = [
            'title' => 'required|string|max:255',
            'number' => 'required|integer',
            'end_date' => 'required',
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
        $season = new Season($request->all());
        $season->save();
        return view('Season.show')->with('season', $season);
    }

    public function show($id)
    {
        $season = Season::find($id);
        if(empty($season)) {
            return redirect()
                ->back()
                ->with('error', 'No hay resultados');
        }
        return view('Season.show')->with('season', $season);
    }

    public function edit($id)
    {
        $season = Season::find($id);
        if (empty($season)) {
            return redirect("/seasons");
            }        
        return view('Season.edit')->with('season', $season);
    }

    public function update(Request $request, $id)
    {
        $season = Season::find($id);
        $reglas = [
            'title' => 'required|string|max:255',
            'number' => 'required|integer',
            'end_date' => 'required',
            'release_date' => 'required'
        ];
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.',
            'numeric' => 'El campo :attribute debe ser un numero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $season->title = $request->input('title') !== $season->title ? $request->input('title') : $season->title;
        $season->number = $request->input('number') !== $season->number ? $request->input('number') : $season->number;
        $season->release_date = $request->input('release_date') !== $season->release_date ? $request->input('release_date') : $season->release_date;
        $season->end_date = $request->input('end_date') !== $season->end_date ? $request->input('end_date') : $season->end_date;
        $season->save();
        return view('Season.show')->with('season', $season);
    }

    public function destroy($id)
    {
        $season = Season::find($id)->serie;
        $destroy = Season::destroy($id);
        return view('Serie.show')->with('serie', $season);
    }
}
