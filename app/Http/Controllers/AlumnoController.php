<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlumnoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('form_students');
    }

    public function enviar(Request $request)
    {
   
        $validacion = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'modulo' => ['required', 'in:DSW,DPL,DOR,DEW,FOL,E1B,SOG'],
            'calificacion' => ['required', 'numeric','min:0.1' , 'max:10'],
        ], [
            'nombre.required' => 'El nombre del alumno es obligatorio.',
            'modulo.required' => 'Debe seleccionar un modulo.',
            'calificacion.required' => 'La calificación es obligatoria.',
        ]);

        Student::create($validacion);

        return back()->with('mensaje', '¡Calificación registrada correctamente!');
    }

    public function mostrardatosStudent()
    {
        $registros = Student::all()->toArray();
        return view('listado_calificaciones', ['registros' => $registros]);
    }
}