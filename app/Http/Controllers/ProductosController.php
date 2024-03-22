<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductosController extends Controller
{
    /**
     * Muestra una lista paginada de productos.
     *
     * @return \Illuminate\View\View
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function index()
    {
        $productos = Producto::simplePaginate(15);
        $totalUsers = Producto::count();
        $totalPages = ceil($totalUsers / 15);

        return view('productos.indexProd', compact('productos', 'totalPages'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');

        $productos = Producto::where('tipoproducto', 'like', "%$term%")
                              ->orWhere('referencia', 'like', "%$term%")
                              ->orWhere('descripcion', 'like', "%$term%")
                              ->orWhere('alto', 'like', "%$term%")
                              ->orWhere('ramas', 'like', "%$term%")
                              ->orWhere('materiales', 'like', "%$term%")
                              ->get();

        return response()->json($productos);
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     *
     * @return \Illuminate\View\View
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function create()
    {
        return view('productos.createProd');
    }


    /**
     * Almacena un nuevo producto en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipoproducto' => 'required|string',
            'referencia' => 'required|string',
            'descripcion' => 'required|string',
            'alto' => 'required|string',
            'ramas' => 'required|string',
            'materiales'=> 'required|string',
            'plano' => 'nullable|file|mimes:pdf|max:30720',
        ]);

        // Inicializar la variable $planoPath como null
        $planoPath = null;

        // Verificar si se proporcionó un archivo
        if ($request->hasFile('plano')) {
            // Procesar la carga del PDF
            $planoPath = $request->file('plano')->store('public/pdfs');
        }

        // Crear un nuevo producto en la base de datos
        $producto = new Producto();
        $producto->tipoproducto = $request->tipoproducto;
        $producto->referencia = $request->referencia;
        $producto->descripcion = $request->descripcion;
        $producto->alto = $request->alto;
        $producto->ramas = $request->ramas;
        $producto->materiales = $request->materiales;
        // Asignar la ruta del archivo al campo 'plano'
        $producto->plano = $planoPath ? str_replace('public/', '', $planoPath) : null;
        $producto->save();

        // Redireccionar al usuario a la lista de productos con un mensaje de éxito
        // return redirect()->route('product.index')->with('success', 'Producto creado correctamente');


        Session::flash('success', 'Producto creado exitosamente');
        return redirect()->route('product.index');
    }

     /**
     * Permite observar el pdf asociado a producto.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function showPdf($id)
    {
        $producto = Producto::find($id);
        if (!$producto || !$producto->plano) {
            // Session::flash('error', 'saaaaaaaaa creado exitosamente');
            return redirect()->back()->with('error', 'Este producto no contiene ningún archivo de soporte pdf por favor edita aquel producto y agregale su respectivo soporte.');
        }

        $pdfPath = storage_path('app/public/' . $producto->plano);

        if (!file_exists($pdfPath)) {
            return redirect()->back()->with('error', 'El archivo PDF no existe.');
        }

        return response()->file($pdfPath);
    }

    /**
     * Vista para editar a dicho producto.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function edit(Producto $producto)
    {
        return view('productos.editProd', compact('producto'));
    }

    /**
     * funcion especifica para editar y enviar los nuevos campos actualizados de producto.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipoproducto' => 'required|string',
            'referencia' =>'required|string',
            'descripcion' =>'required|string',
            'alto' =>'required|string',
            'ramas' => 'required|string',
            'materiales'=> 'required|string',

            'plano' => 'nullable|file|mimes:pdf|max:30720',
        ]);

        // Si se proporciona un nuevo PDF, eliminar el PDF anterior
        if ($request->hasFile('plano')) {
            Storage::delete('public/' . $producto->plano);
            $planoPath = $request->file('plano')->store('public/pdfs');
            $producto->plano = str_replace('public/', '', $planoPath);
        }

        // Actualizar los demás campos del producto
        $producto->update($request->all());

        // return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente');
        Session::flash('success', 'Producto actualizado correctamente');
        return redirect()->route('product.index');
    }

     /**
     * Esta funcion permite eliminar un producto y su pdf asociado.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Alexander Gomez <agpan007@gmail.com>
     */
    public function destroy(Producto $producto)
    {
        // Si el producto tiene un archivo PDF asociado, obtenemos la ruta del archivo y lo eliminamos si existe
        if (!empty($producto->plano)) {
            $pdfPath = storage_path('app/public/' . $producto->plano);
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        // Devolver una respuesta JSON indicando que el producto se eliminó correctamente
        return response()->json(['success' => 'Producto eliminado satisfactoriamente']);
    }





}

