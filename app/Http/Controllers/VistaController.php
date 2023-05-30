<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class VistaController extends Controller
{
    public function viewHeader(){
        $idUser = Auth::user()->id;
        $tareas = Tarea::where('id_user',$idUser)->get();
        // var_dump(empty($tareas));
        // var_dump((count($tareas)));
        // die();

        return view('home.header',['tareas' =>$tareas]);
    }
    public function viewBody(){
        return view('home.body');
    }
}
