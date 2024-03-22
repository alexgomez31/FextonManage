<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Producto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();
        $totalEmpleados = Empleado::count();

        return view('dashboard')->with(compact('totalProductos', 'totalEmpleados'));
    }
}
