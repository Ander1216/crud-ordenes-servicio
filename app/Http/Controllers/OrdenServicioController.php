<?php

namespace App\Http\Controllers;

use App\Models\OrdenServicio;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class OrdenServicioController extends Controller
{
    public function index()
    {
        $ordenes = OrdenServicio::with(['cliente', 'usuario'])->get();

        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();

        return view('ordenes.create', compact('clientes', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'usuario_id' => 'required',
            'codigo_orden' => 'required|unique:orden_de_servicio,codigo_orden',
            'descripcion' => 'required',
            'tipo_servicio' => 'required',
            'prioridad' => 'required'
        ]);

        OrdenServicio::create([
            'cliente_id' => $request->cliente_id,
            'usuario_id' => $request->usuario_id,
            'codigo_orden' => $request->codigo_orden,
            'descripcion' => $request->descripcion,
            'tipo_servicio' => $request->tipo_servicio,
            'prioridad' => $request->prioridad,
            'estado' => 'Pendiente'
        ]);

        return redirect('/ordenes')
            ->with('success', 'Orden creada correctamente');
    }

    public function edit($id)
    {
        $orden = OrdenServicio::findOrFail($id);

        return view('ordenes.edit', compact('orden'));
    }

    public function update(Request $request, $id)
    {
        $orden = OrdenServicio::findOrFail($id);

        $orden->update([
            'tipo_servicio' => $request->tipo_servicio,
            'prioridad' => $request->prioridad,
            'estado' => $request->estado,
            'fecha_cierre_estimada' => $request->fecha_cierre_estimada
        ]);

        return redirect('/ordenes')
            ->with('success', 'Orden actualizada correctamente');
    }
}