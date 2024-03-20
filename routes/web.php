<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. M

ake something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::post('/useredit', [userController::class, 'actualizarperfil'])->name('profile.updatee');

Route::get('producto',[ProductosController::class,'index'])->name('product.index');



// crear productos
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');

// buscar productos
Route::get('/productos/search', [ProductosController::class, 'search'])->name('productos.search');

// editar productos
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');

//eliminar productos

// ver product
Route::get('/productos/{id}/ver-pdf', [ProductosController::class, 'showPdf'])->name('productos.show');


// ruta empleados
Route::get('empleados',[EmpleadosController::class,'index'])->name('empleados.index');

});

require __DIR__.'/auth.php';

Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');


