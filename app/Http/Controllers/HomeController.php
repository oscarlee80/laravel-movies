<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productos = [
        0 => [
            'id' => 1,
            'nombre' => 'Alpargatas Dani',
            'precio' => 15000
        ],
        1 => [
            'id' => 2,
            'nombre' => 'Alpargatas Herni',
            'precio' => 12000
        ],
        3 => [
            'id' => 3,
            'nombre' => 'Alpargatas Rodo',
            'precio' => 5000
        ]
    ];
    public function index() 
    {
        return view('index');
    }

    public function catalogo ()
    {
        $productos = $this->productos;
        return view('catalogo')-> with('productos', $productos);
    }

    public function mostrarProducto($id)
    {
        $productos = $this->productos;
        foreach ($productos as $producto) {
            if($producto['id'] == $id) {
                return view('producto')->with('producto', $producto);
            }
        }

        return redirect()->back();
    }
}
