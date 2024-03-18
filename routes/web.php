<?php

use App\Http\Controllers\CategoriaController;
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
});

require __DIR__.'/auth.php';

Route::post('/useredit', [userController::class, 'actualizarperfil'])->name('profile.updatee');

Route::get('producto',[ProductosController::class,'index'])->name('product.index');

Route::get('categoria',[CategoriaController::class,'index'])->name('categoria.index');


// crear productos
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');

Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');

Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');

