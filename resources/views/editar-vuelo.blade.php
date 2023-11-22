@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <!-- errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $dato)
                            <li>{{ $dato }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="/actualizar-vuelo/{{ $vuelo->id  }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Origen: </label>
                        <input type="text" class="form-control" name="origen" value="{{ $vuelo->origen }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino: </label>
                        <input type="text" class=" form-control" name="destino" value="{{ $vuelo->destino }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Vuelo: </label>
                        <input type="date" class="form-control" name="fecha_vuelo" value="{{ \Carbon\Carbon::parse($vuelo->fecha_vuelo)->format('Y-m-d') }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de Vuelo</label>
                        <input type="time" class="form-control" name="hora_vuelo" value="{{ \Carbon\Carbon::parse($vuelo->hora_vuelo)->format('H:i') }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio del Vuelo: </label>
                        <input type="text" class="form-control" name="precio_vuelo" value="{{ $vuelo->precio_vuelo }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad de Pasajeros: </label>
                        <input type="number" class="form-control" name="cantidad_pasajeros" value="{{ $vuelo->cantidad_pasajeros }}" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <br>
                        <a href="/lista-vuelos" class="btn btn-primary">Ver Lista de Vuelos</a>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
