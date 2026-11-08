@extends('layouts.app')

@section('title','Listado de Órdenes')

@section('content')

<h1 class="mb-4">
    Gestión de Órdenes
</h1>

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

    {{ session('success') }}

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

<a href="{{ route('ordenes.create') }}"
   class="btn btn-success mb-3">

    <i class="bi bi-plus-circle"></i>

    Nueva Orden

</a>

<table class="table table-bordered table-striped table-hover">

    <thead class="table-dark">

    <tr>
        <th>Cliente</th>
        <th>Usuario</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Tipo Servicio</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Fecha Cierre</th>
        <th>Fecha Creación</th>
        <th>Acción</th>
    </tr>

    </thead>

    <tbody>

    @foreach($ordenes as $orden)

    <tr>

        <td>{{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}</td>
        <td>{{ $orden->usuario->username }}</td>
        <td>{{ $orden->codigo_orden }}</td>
        <td>{{ $orden->descripcion }}</td>
        <td>{{ $orden->tipo_servicio }}</td>
        <td>{{ $orden->prioridad }}</td>
        <td>{{ $orden->estado }}</td>
        <td>{{ $orden->fecha_cierre_estimada }}</td>
        <td>{{ $orden->created_at }}</td>

        <td>

            <a href="{{ route('ordenes.edit',$orden->id) }}"
               class="btn btn-primary btn-sm">

                <i class="bi bi-pencil-square"></i>

                Editar

            </a>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection