@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
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
                    Ingresar los datos de los pasajeros : <br>{{ $vuelo->origen }} --> {{ $vuelo->destino  }} // {{ $vuelo->fecha_vuelo  }}
                </div>
                <form class="p-4" method="POST" action="/guardar-pasajeros/{{ $vuelo->id  }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="apellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="celular" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">numero_asientos: </label>
                        <input type="text" class="form-control" name="numero_asientos" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <br>
                        <a href="/lista-vuelos" class="btn btn-primary">Ver Lista de Vuelos</a><br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Pasajeros
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Celular</th>
                            <th scope="col">N.Asientos</th>
                            <th scope="col" colspan="3">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pasajeros as $dato)
                        <tr>
                            <td scope="row">{{ $dato->id  }}</td>
                            <td>{{ $dato->nombre }}</td>
                            <td>{{ $dato->apellido }}</td>
                            <td>{{ $dato->celular }}</td>
                            <td>{{ $dato->numero_asientos }}</td>
                            <td><a class="text-primary" href="/enviar-mensaje/{{ $dato->id }}"><i class="bi bi-cursor"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="/eliminar-pasajero/{{ $dato->id }}"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
