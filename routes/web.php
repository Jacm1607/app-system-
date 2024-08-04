<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/producto/index', [ProductoController::class , 'index'])->name('producto.index');
    Route::get('/producto/create', [ProductoController::class , 'create'])->name('producto.create');
    Route::post('/producto/store', [ProductoController::class , 'store'])->name('producto.store');
    Route::get('/producto/edit/{id}', [ProductoController::class , 'edit'])->name('producto.edit');
    Route::put('/producto/update/{id}', [ProductoController::class , 'update'])->name('producto.update');
    Route::get('/producto/delete/{id}', [ProductoController::class , 'delete'])->name('producto.delete');

    Route::get('/privilegio/index', [PrivilegioController::class , 'index'])->name('privilegio.index');
    Route::get('/privilegio/create', [PrivilegioController::class , 'create'])->name('privilegio.create');
    Route::post('/privilegio/store', [PrivilegioController::class , 'store'])->name('privilegio.store');
    Route::get('/privilegio/edit/{id}', [PrivilegioController::class , 'edit'])->name('privilegio.edit');
    Route::put('/privilegio/update/{id}', [PrivilegioController::class , 'update'])->name('privilegio.update');
    Route::get('/privilegio/delete/{id}', [PrivilegioController::class , 'delete'])->name('privilegio.delete');

    Route::get('/servicio/index', [ServicioController::class , 'index'])->name('servicio.index');
    Route::get('/servicio/create', [ServicioController::class , 'create'])->name('servicio.create');
    Route::post('/servicio/store', [ServicioController::class , 'store'])->name('servicio.store');
    Route::get('/servicio/edit/{id}', [ServicioController::class , 'edit'])->name('servicio.edit');
    Route::put('/servicio/update/{id}', [ServicioController::class , 'update'])->name('servicio.update');
    Route::get('/servicio/delete/{id}', [ServicioController::class , 'delete'])->name('servicio.delete');

    Route::get('/area/index', [AreaController::class , 'index'])->name('area.index');
    Route::get('/area/create', [AreaController::class , 'create'])->name('area.create');
    Route::post('/area/store', [AreaController::class , 'store'])->name('area.store');
    Route::get('/area/edit/{id}', [AreaController::class , 'edit'])->name('area.edit');
    Route::put('/area/update/{id}', [AreaController::class , 'update'])->name('area.update');
    Route::get('/area/delete/{id}', [AreaController::class , 'delete'])->name('area.delete');

    Route::get('/persona/index', [PersonaController::class , 'index'])->name('persona.index');
    Route::get('/persona/create', [PersonaController::class , 'create'])->name('persona.create');
    Route::post('/persona/store', [PersonaController::class , 'store'])->name('persona.store');
    Route::get('/persona/edit/{id}', [PersonaController::class , 'edit'])->name('persona.edit');
    Route::put('/persona/update/{id}', [PersonaController::class , 'update'])->name('persona.update');
    Route::get('/persona/delete/{id}', [PersonaController::class , 'delete'])->name('persona.delete');
    Route::get('/persona/exportar-pdf', [PersonaController::class , 'pdf'])->name('persona.pdf');
    

    Route::get('/cliente/index', [ClienteController::class , 'index'])->name('cliente.index');
    Route::get('/cliente/create/{persona}', [ClienteController::class , 'create'])->name('cliente.create');
    Route::post('/cliente/store', [ClienteController::class , 'store'])->name('cliente.store');
    Route::get('/cliente/edit/{id}', [ClienteController::class , 'edit'])->name('cliente.edit');
    Route::put('/cliente/update/{id}', [ClienteController::class , 'update'])->name('cliente.update');
    Route::get('/cliente/delete/{id}', [ClienteController::class , 'delete'])->name('cliente.delete');

    Route::get('/proveedor/index', [ProveedorController::class , 'index'])->name('proveedor.index');
    Route::get('/proveedor/create', [ProveedorController::class , 'create'])->name('proveedor.create');
    Route::post('/proveedor/store', [ProveedorController::class , 'store'])->name('proveedor.store');
    Route::get('/proveedor/edit/{id}', [ProveedorController::class , 'edit'])->name('proveedor.edit');
    Route::put('/proveedor/update/{id}', [ProveedorController::class , 'update'])->name('proveedor.update');
    Route::get('/proveedor/delete/{id}', [ProveedorController::class , 'delete'])->name('proveedor.delete');

    Route::get('/usuario/index', [UsuarioController::class , 'index'])->name('usuario.index');
    Route::get('/usuario/create', [UsuarioController::class , 'create'])->name('usuario.create');
    Route::post('/usuario/store', [UsuarioController::class , 'store'])->name('usuario.store');
    Route::get('/usuario/edit/{id}', [UsuarioController::class , 'edit'])->name('usuario.edit');
    Route::put('/usuario/update/{id}', [UsuarioController::class , 'update'])->name('usuario.update');
    Route::get('/usuario/delete/{id}', [UsuarioController::class , 'delete'])->name('usuario.delete');
    Route::get('/usuario/reset/{id}', [UsuarioController::class , 'reset_password'])->name('usuario.reset_password');

    Route::get('/rol/index', [RolController::class , 'index'])->name('rol.index');
    Route::get('/rol/create', [RolController::class , 'create'])->name('rol.create');
    Route::post('/rol/store', [RolController::class , 'store'])->name('rol.store');
    Route::get('/rol/edit/{id}', [RolController::class , 'edit'])->name('rol.edit');
    Route::put('/rol/update/{id}', [RolController::class , 'update'])->name('rol.update');
    Route::get('/rol/delete/{id}', [RolController::class , 'delete'])->name('rol.delete');
    
    Route::get('/venta/index', [VentaController::class , 'index'])->name('venta.index');
    Route::get('/venta/create', [VentaController::class , 'create'])->name('venta.create');
    Route::post('/venta/store', [VentaController::class , 'store'])->name('venta.store');
    Route::get('/venta/show/{id}', [VentaController::class , 'show'])->name('venta.show');
    Route::put('/venta/update/{id}', [VentaController::class , 'update'])->name('venta.update');
    Route::get('/venta/delete/{id}', [VentaController::class , 'delete'])->name('venta.delete');
    Route::get('/venta/add/{servicio}', [VentaController::class , 'add'])->name('venta.add');
    
    Route::get('/compra/index', [CompraController::class , 'index'])->name('compra.index');
    Route::get('/compra/create', [CompraController::class , 'create'])->name('compra.create');
    Route::post('/compra/store', [CompraController::class , 'store'])->name('compra.store');
    Route::get('/compra/show/{id}', [CompraController::class , 'show'])->name('compra.show');
    Route::put('/compra/update/{id}', [CompraController::class , 'update'])->name('compra.update');
    Route::get('/compra/delete/{id}', [CompraController::class , 'delete'])->name('compra.delete');
    Route::get('/compra/add/{servicio}', [CompraController::class , 'add'])->name('compra.add');
    
    Route::get('/personal/index', [PersonalController::class , 'index'])->name('personal.index');
    Route::get('/personal/create/{persona}', [PersonalController::class , 'create'])->name('personal.create');
    Route::post('/personal/store', [PersonalController::class , 'store'])->name('personal.store');
    Route::get('/personal/edit/{id}', [PersonalController::class , 'edit'])->name('personal.edit');
    Route::put('/personal/update/{id}', [PersonalController::class , 'update'])->name('personal.update');
    Route::get('/personal/delete/{id}', [PersonalController::class , 'delete'])->name('personal.delete');
    
});
