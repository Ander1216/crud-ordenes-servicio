@extends('layouts.app')

@section('title','Nueva Orden')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h3 class="mb-0">
            Nueva Orden de Servicio
        </h3>
    </div>

    <div class="card-body">

        <form action="{{ route('ordenes.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Cliente</label>

                <select name="cliente_id" class="form-select">

                    @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id_cliente }}">
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>

                <select name="usuario_id" class="form-select">

                    @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id_usuario }}">
                        {{ $usuario->username }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Código Orden</label>

                <input
                    type="text"
                    name="codigo_orden"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>

                <textarea
                    name="descripcion"
                    rows="4"
                    class="form-control"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo Servicio</label>

                <input
                    type="text"
                    name="tipo_servicio"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prioridad</label>

                <select
                    name="prioridad"
                    class="form-select">

                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                    <option value="Urgente">Urgente</option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                <i class="bi bi-save"></i>
                Guardar Orden

            </button>

            <a href="{{ route('ordenes.index') }}"
               class="btn btn-secondary">

                Volver

            </a>

        </form>

    </div>

</div>

@endsection