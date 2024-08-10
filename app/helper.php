<?php


use Illuminate\Support\Facades\DB;

    function privilegio ($slug = "test") {
        $resultados = DB::table('roles as r')
        ->join('rol_privilegio as rp', 'r.id', '=', 'rp.id_rol')
        ->join('privilegios as p', 'rp.id_privilegio', '=', 'p.id')
        ->where('p.slug', $slug)->where('r.id', auth()->user()->id_rol)
        ->count();
        // dd($slug);
        if(!$resultados) {
            return abort(403);
        }
    }