<?php

namespace App\Http\Controllers;

use App\Models\Inquilino;
use Illuminate\Http\Request;

class Inquilino_Controller extends Controller
{
    /**
     * Mostrar todos los registros.
     */
    public function index()
    {
        return response()->json(Inquilino::all());
    }

    /**
     * Guardar un nuevo registro.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|size:9|unique:inquilino,telefono',
            'dni' => 'required|string|max:20|unique:inquilino,dni',
            'correo' => 'required|email|unique:inquilino,correo',
            'cuota' => 'required',
            'fecha_ingreso' => 'required|date',
        ]);

        $inquilino = Inquilino::create($validated);

        return response()->json([
            'message' => 'Inquilino registrado correctamente.',
            'data' => $inquilino
        ], 201);
    }

    /**
     * Mostrar un registro específico.
     */
    public function show(Inquilino $inquilino)
    {
        return response()->json($inquilino);
    }

    /**
     * Actualizar un registro.
     */
    public function update(Request $request, Inquilino $inquilino)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|size:9|unique:inquilino,telefono,' . $inquilino->id,
            'dni' => 'required|string|max:20|unique:inquilino,dni,' . $inquilino->id,
            'correo' => 'required|email|unique:inquilino,correo,' . $inquilino->id,
            'cuota' => 'required',
            'fecha_ingreso' => 'required|date',
        ]);

        $inquilino->update($validated);

        return response()->json([
            'message' => 'Inquilino actualizado correctamente.',
            'data' => $inquilino
        ]);
    }

    /**
     * Eliminar un registro.
     */
    public function destroy(Inquilino $inquilino)
    {
        $inquilino->delete();

        return response()->json([
            'message' => 'Inquilino eliminado correctamente.'
        ]);
    }
}
