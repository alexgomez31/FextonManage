<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmpleadosController extends Controller
{
    public function index()
    {

        $empleados = Empleado::simplePaginate(15);
            $totalEmple = Empleado::count();
            $totalPages = ceil($totalEmple / 15);

        return view('empleados.indexEmp', compact('empleados', 'totalPages'));
    }

    public function create()
    {
        return view('empleados.createEmp');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'names' => 'required|string',
            'documento' => 'required|string',
            'numdoc' => 'required|string',
            'cargo' => 'required|string',
            'fecha_ingreso' => 'required|string',
            'fecha_fin' => 'required|string',
            'nacionalidad' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'document_soport' => 'nullable|file|mimes:pdf|max:2048',
            'contrato_soport' => 'nullable|file|mimes:pdf|max:2048',
            'carta_soport' => 'nullable|file|mimes:pdf|max:2048',
            'otro_si_soport' => 'nullable|file|mimes:pdf|max:2048',
            'liquidaciones_soport' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Inicializar las variables de soporte como null
        $documentSoportPath = null;
        $contratoSoportPath = null;
        $cartaSoportPath = null;
        $otroSiSoportPath = null;
        $liquidacionesSoportPath = null;

        // Verificar si se proporcionaron archivos de soporte y procesar la carga
        if ($request->hasFile('document_soport')) {
            $documentSoportPath = $request->file('document_soport')->store('public/pdfs');
        }

        if ($request->hasFile('contrato_soport')) {
            $contratoSoportPath = $request->file('contrato_soport')->store('public/pdfs');
        }

        if ($request->hasFile('carta_soport')) {
            $cartaSoportPath = $request->file('carta_soport')->store('public/pdfs');
        }

        if ($request->hasFile('otro_si_soport')) {
            $otroSiSoportPath = $request->file('otro_si_soport')->store('public/pdfs');
        }

        if ($request->hasFile('liquidaciones_soport')) {
            $liquidacionesSoportPath = $request->file('liquidaciones_soport')->store('public/pdfs');
        }

        // Crear un nuevo empleado en la base de datos
        $empleado = new Empleado();
        $empleado->names = $request->names;
        $empleado->documento = $request->documento;
        $empleado->numdoc = $request->numdoc;
        $empleado->cargo = $request->cargo;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        $empleado->fecha_fin = $request->fecha_fin;
        $empleado->nacionalidad = $request->nacionalidad;
        $empleado->ciudad = $request->ciudad;
        $empleado->direccion = $request->direccion;
        $empleado->telefono = $request->telefono;
        $empleado->email = $request->email;
        // Asignar las rutas de los archivos a los campos correspondientes
        $empleado->document_soport = $documentSoportPath ? str_replace('public/', '', $documentSoportPath) : null;
        $empleado->contrato_soport = $contratoSoportPath ? str_replace('public/', '', $contratoSoportPath) : null;
        $empleado->carta_soport = $cartaSoportPath ? str_replace('public/', '', $cartaSoportPath) : null;
        $empleado->otro_si_soport = $otroSiSoportPath ? str_replace('public/', '', $otroSiSoportPath) : null;
        $empleado->liquidaciones_soport = $liquidacionesSoportPath ? str_replace('public/', '', $liquidacionesSoportPath) : null;
        $empleado->save();

        // Redireccionar al usuario con un mensaje de éxito
        Session::flash('success', 'Empleado creado exitosamente');
        return redirect()->route('empleados.index');
    }


    public function showPdf($id, $tipoSoporte)
{
    $empleado = Empleado::find($id);

    // Verificar si el empleado existe
    if (!$empleado) {
        return redirect()->back()->with('error', 'Este empleado no existe.');
    }

    // Verificar si el tipo de soporte es válido
    if (!in_array($tipoSoporte, ['document_soport', 'contrato_soport', 'carta_soport', 'otro_si_soport', 'liquidaciones_soport'])) {
        return redirect()->back()->with('error', 'Tipo de soporte no válido.');
    }

    // Obtener el nombre del campo de soporte en función del tipo
    $campoSoporte = $tipoSoporte;

    // Verificar si el empleado tiene un archivo de soporte asociado
    if (!$empleado->$campoSoporte) {
        return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    }

    // Obtener la ruta del archivo PDF
    $pdfPath = storage_path('app/public/' . $empleado->$campoSoporte);

    // Verificar si el archivo PDF existe
    if (!file_exists($pdfPath)) {
        return redirect()->back()->with('error', 'El archivo PDF no existe.');
    }

    // Devolver el archivo PDF al usuario
    return response()->file($pdfPath);
}





    // ver un pdf mediante un modal 
    // public function showPdfDocumentoSoport($id)
    // {
    //     $empleado = Empleado::find($id);

    //     // Verificar si el empleado existe y si hay un archivo de soporte asociado
    //     if (!$empleado || !$empleado->document_soport) {
    //         return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    //     }

    //     // Obtener la ruta del archivo PDF
    //     $pdfPath = storage_path('app/public/' . $empleado->document_soport);

    //     // Verificar si el archivo PDF existe
    //     if (!file_exists($pdfPath)) {
    //         return redirect()->back()->with('error', 'El archivo PDF no existe.');
    //     }

    //     // Devolver el archivo PDF al usuario
    //     return response()->file($pdfPath);
    // }

    // public function showPdfContratoSoport($id)
    // {
    //     $empleado = Empleado::find($id);

    //     // Verificar si el empleado existe y si hay un archivo de soporte asociado
    //     if (!$empleado || !$empleado->contrato_soport) {
    //         return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    //     }

    //     // Obtener la ruta del archivo PDF
    //     $pdfPath = storage_path('app/public/' . $empleado->contrato_soport);

    //     // Verificar si el archivo PDF existe
    //     if (!file_exists($pdfPath)) {
    //         return redirect()->back()->with('error', 'El archivo PDF no existe.');
    //     }

    //     // Devolver el archivo PDF al usuario
    //     return response()->file($pdfPath);
    // }

    // public function showPdfCartaSoport($id)
    // {
    //     $empleado = Empleado::find($id);

    //     // Verificar si el empleado existe y si hay un archivo de soporte asociado
    //     if (!$empleado || !$empleado->carta_soport) {
    //         return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    //     }

    //     // Obtener la ruta del archivo PDF
    //     $pdfPath = storage_path('app/public/' . $empleado->carta_soport);

    //     // Verificar si el archivo PDF existe
    //     if (!file_exists($pdfPath)) {
    //         return redirect()->back()->with('error', 'El archivo PDF no existe.');
    //     }

    //     // Devolver el archivo PDF al usuario
    //     return response()->file($pdfPath);
    // }
    // public function showPdfOtroSiSoport($id)
    // {
    //     $empleado = Empleado::find($id);

    //     // Verificar si el empleado existe y si hay un archivo de soporte asociado
    //     if (!$empleado || !$empleado->otro_si_soport) {
    //         return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    //     }

    //     // Obtener la ruta del archivo PDF
    //     $pdfPath = storage_path('app/public/' . $empleado->otro_si_soport);

    //     // Verificar si el archivo PDF existe
    //     if (!file_exists($pdfPath)) {
    //         return redirect()->back()->with('error', 'El archivo PDF no existe.');
    //     }

    //     // Devolver el archivo PDF al usuario
    //     return response()->file($pdfPath);
    // }

    // public function showPdfLiquidacion($id)
    // {
    //     $empleado = Empleado::find($id);

    //     // Verificar si el empleado existe y si hay un archivo de soporte asociado
    //     if (!$empleado || !$empleado->liquidaciones_soport) {
    //         return redirect()->back()->with('error', 'Este empleado no tiene ningún archivo de soporte PDF.');
    //     }

    //     // Obtener la ruta del archivo PDF
    //     $pdfPath = storage_path('app/public/' . $empleado->liquidaciones_soport);

    //     // Verificar si el archivo PDF existe
    //     if (!file_exists($pdfPath)) {
    //         return redirect()->back()->with('error', 'El archivo PDF no existe.');
    //     }
    //     // Devolver el archivo PDF al usuario
    //     return response()->file($pdfPath);
    // }
}
