<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Carbon\Carbon;

class Tareacontroller extends Controller
{
    public function addTarea(Request $request){

        try {
            $fecha = Carbon::now('America/Lima')->format('Y-m-d H:i:s');
              if ($request->hasFile('archivo')) {

                $archivo = $request->file('archivo');
                $ruta = 'pdf/'.time().'-'. $archivo->getClientOriginalName();
                $archivo->move(public_path('pdf'), $ruta);

                $tarea  = Tarea::create([
                    'id_user'=>$request->id,
                    'tarea' => $request->tarea,
                    'archivo' => $ruta,
                    'comentario' => $request->comentario,
                    'fecha' => $fecha,

                 ]);

                 return redirect()->route('viewHeader')->with('status','Tarea Agregada');
              }

        } catch (\Throwable $th) {
           return "error".$th->getMessage();
        }
    }
    public function deleteTarea(request $request){
        try {
            $id = $request->id;
              Tarea::find($id)->delete();

             return redirect()->route('viewHeader');


        } catch (\Throwable $th) {
            return "error".$th->getMessage();

        }


        }

}
