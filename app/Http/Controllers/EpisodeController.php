<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Episode;

use App\Season;

class EpisodeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $seasons = Season::all();
        return view('Episode.create')->with('seasons', $seasons);
    }

    public function store(Request $request)
    {
        $reglas = [
            'title' => 'required|string|max:255',
            'number' => 'required|integer',
            'rating' => 'required',
            'release_date' => 'required',
            'season_id' => 'required|integer'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $request->request->remove('submit');
        $episode = new Episode($request->all());
        $episode->save();
        return view('/Episode.show')->with('episode', $episode);
    }

    public function show($id)
    {
        $episode = Episode::find($id);
        if(empty($episode)) {
            return redirect()
                ->back()
                ->with('error', 'No hay resultados');
        }
        return view('Episode.show')->with('episode', $episode);
    }

    public function edit($id)
    {
        $episode = Episode::find($id);
        if (empty($episode)) {
            return redirect("/episodes");
            }
        return view('Episode.edit')->with('episode', $episode);
    }

    public function update(Request $request, $id)
    {
        $episode = Episode::find($id);
        $reglas = [
            'title' => 'required|string|max:255',
            'number' => 'required|integer',
            'rating' => 'required',
            'release_date' => 'required'
        ];
        $mensaje = [
            'unique' => 'El campo :attribute ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un numero entero.'
        ];
        $this->validate($request, $reglas, $mensaje);
        $episode->title = $request->input('title') !== $episode->title ? $request->input('title') : $episode->title;
        $episode->number = $request->input('number') !== $episode->number ? $request->input('number') : $episode->number;
        $episode->release_date = $request->input('release_date') !== $episode->release_date ? $request->input('release_date') : $episode->release_date;
        $episode->rating = $request->input('rating') !== $episode->rating ? $request->input('rating') : $episode->rating;
        $episode->save();
        return view('Episode.show')->with('episode', $episode);
    }

    public function destroy($id)
    {
        $episode = Episode::find($id)->season;
        $destroy = Episode::destroy($id);
        return view('Season.show')->with('season', $episode);
    }
}
