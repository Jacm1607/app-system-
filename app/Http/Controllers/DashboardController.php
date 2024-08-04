<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $fecha1 = $request->date1 ?? date('Y-m-d');
        $fecha2 = $request->date2 ?? date('Y-m-d');
        $ventas = DB::select("SELECT COUNT(id) as 'cantidad', date(created_at) as 'fecha' FROM `ventas` WHERE created_at BETWEEN ? AND ? GROUP BY date(created_at)", [$fecha1, $fecha2]);
        $compras = DB::select("SELECT COUNT(id) as 'cantidad', date(created_at) as 'fecha' FROM `compras` WHERE created_at BETWEEN ? AND ? GROUP BY date(created_at)", [$fecha1, $fecha2]);
        $productos = DB::select("SELECT cantidad as 'value', nombre AS 'name' FROM `productos` where estado = 1 and cantidad < 15");
        $cantidad_ventas = [];
        $fechas_ventas = [];
        foreach ($ventas as $venta) {
            $cantidad_ventas[] = $venta->cantidad;
            $fechas_ventas[] = $venta->fecha;
        }
        
        $cantidad_compras = [];
        $fechas_compras = [];
        foreach ($compras as $compra) {
            $cantidad_compras[] = $compra->cantidad;
            $fechas_compras[] = $compra->fecha;
        }
        return view('dashboard')->with('fechas_ventas', $fechas_ventas)->with('cantidad_ventas', $cantidad_ventas)->with('fechas_compras', $fechas_compras)->with('cantidad_compras', $cantidad_compras)->with('productos', $productos);
    }
}
