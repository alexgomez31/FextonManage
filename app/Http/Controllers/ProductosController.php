<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::all();
        return view('productos.indexProd', compact('productos'));
    }


    public function create()
    {
        return view('productos.createProd');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipoproducto' => 'required|string',
            'referencia' => 'required|string',
            'descripcion' => 'required|string',
            'alto' => 'required|string',
            'ancho' => 'required|string',
        ]);

        // Crear un nuevo producto en la base de datos
        Producto::create([
            'tipoproducto' => $request->tipoproducto,
            'referencia' => $request->referencia,
            'descripcion' => $request->descripcion,
            'alto' => $request->alto,
            'ancho' => $request->ancho,
        ]);

        // Redireccionar al usuario a la lista de productos con un mensaje de éxito
        return redirect()->route('product.index')->with('success', 'Producto creado correctamente');
    }
    public function edit(Producto $producto)
    {
        return view('productos.editProd', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'tipoproducto' => 'required|string',
            'referencia' =>'required|string',
            'descripcion' =>'required|string',
            'alto' =>'required|string',
            'ancho' =>'required|string',
        ]);

        $producto->update($request->all());

        return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['success' => 'Producto eliminado satisfactoriamente']);
    }



}
