@extends('layouts.app')

@section('title','Editar Orden')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">
        <h3 class="mb-0">
            Editar Orden de Servicio
        </h3>
    </div>

    <div class="card-body">

        <form
            action="{{ route('ordenes.update',$orden->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Cliente</label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}"
                    readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $orden->usuario->username }}"
                    readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Código Orden</label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $orden->codigo_orden }}"
                    readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>

                <textarea
                    class="form-control"
                    readonly>{{ $orden->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo Servicio</label>

                <input
                    type="text"
                    name="tipo_servicio"
                    value="{{ $orden->tipo_servicio }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Prioridad</label>

                <select
                    name="prioridad"
                    class="form-select">

                    <option value="Baja"
                    {{ $orden->prioridad=='Baja' ? 'selected' : '' }}>
                    Baja
                    </option>

                    <option value="Media"
                    {{ $orden->prioridad=='Media' ? 'selected' : '' }}>
                    Media
                    </option>

                    <option value="Alta"
                    {{ $orden->prioridad=='Alta' ? 'selected' : '' }}>
                    Alta
                    </option>

                    <option value="Urgente"
                    {{ $orden->prioridad=='Urgente' ? 'selected' : '' }}>
                    Urgente
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>

                <select
                    name="estado"
                    class="form-select">

                    <option value="Pendiente"
                    {{ $orden->estado=='Pendiente' ? 'selected' : '' }}>
                    Pendiente
                    </option>

                    <option value="En Proceso"
                    {{ $orden->estado=='En Proceso' ? 'selected' : '' }}>
                    En Proceso
                    </option>

                    <option value="Cerrada"
                    {{ $orden->estado=='Cerrada' ? 'selected' : '' }}>
                    Cerrada
                    </option>

                    <option value="Cancelada"
                    {{ $orden->estado=='Cancelada' ? 'selected' : '' }}>
                    Cancelada
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Fecha Cierre Estimada
                </label>

                <input
                    type="date"
                    name="fecha_cierre_estimada"
                    value="{{ $orden->fecha_cierre_estimada }}"
                    class="form-control">
            </div>

            <button
                type="submit"
                class="btn btn-warning">

                <i class="bi bi-pencil-square"></i>
                Actualizar

            </button>

            <a href="{{ route('ordenes.index') }}"
               class="btn btn-secondary">

                Volver

            </a>

        </form>

    </div>

</div>

@endsection