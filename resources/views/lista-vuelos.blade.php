@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>
                            <th scope="col">F.Vuelo</th>
                            <th scope="col">H.Vuelo</th>
                            <th scope="col">Precio del Vuelo</th>
                            <th scope="col">C.Pasajeros</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($vuelos as $dato)
                        <tr>
                            <td scope="row">{{ $dato->id  }}</td>
                            <td>{{ $dato->origen }}</td>
                            <td>{{ $dato->destino }}</td>
                            <td>{{ \Carbon\Carbon::parse($dato->fecha_vuelo)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($dato->hora_vuelo)->format('H:i a') }}</td>
                            <td>{{ $dato->precio_vuelo }}</td>
                            <td>{{ $dato->cantidad_pasajeros }}</td>
                            <td><a class="text-success" href="/editar-vuelo/{{ $dato->id }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a class="text-primary" href="/agregar-pasajeros/{{ $dato->id }}"><i class="bi bi-cursor"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="/eliminar-vuelo/{{ $dato->id }}"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            <br><a href="index.php" class="btn btn-primary">Volver al registro de vuelos</a><br>
        </div>
    </div>
</div>
@endsection
