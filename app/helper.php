<?php


use Illuminate\Support\Facades\DB;

    function privilegio ($slug = "test") {
        $resultados = DB::table('roles as r')
        ->join('rol_privilegio as rp', 'r.id', '=', 'rp.idRol')
        ->join('privilegios as p', 'rp.idPrivilegio', '=', 'p.id')
        ->where('p.slug', $slug)->where('r.id', auth()->user()->idRol)
        ->count();
        // dd($slug);
        if(!$resultados) {
            return abort(403);
        }
    }