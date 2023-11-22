<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function verListaVuelos() {
        $vuelos = Vuelo::paginate(20);

        return view('lista-vuelos', [
            'vuelos' => $vuelos
        ]);
    }

    public function guardarVuelo(Request $request) {
        $datos = $request->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fecha_vuelo' => 'required|date',
            'hora_vuelo' => 'required|date_format:H:i',
            'precio_vuelo' => 'required|numeric',
            'cantidad_pasajeros' => 'required|numeric'
        ]);

        $vuelo = Vuelo::create($datos);
        $vuelo->save();
        return redirect('/');
    }

    public function editarVuelo() {
        $vuelo = Vuelo::find(request()->route('id'));
        return view('editar-vuelo', [
            'vuelo' => $vuelo
        ]);
    }

    public function actualizarVuelo(Request $request) {
        $datos = $request->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fecha_vuelo' => 'required|date',
            'hora_vuelo' => 'required|date_format:H:i',
            'precio_vuelo' => 'required|numeric',
            'cantidad_pasajeros' => 'required|numeric'
        ]);

        $vuelo = Vuelo::find(request()->route('id'));
        $vuelo->update($datos);
        $vuelo->save();
        return redirect('/lista-vuelos');
    }

    public function eliminarVuelo(Request $request) {
        $vuelo = Vuelo::find($request->route('id'));
        $vuelo->delete();
        return redirect()->route('lista-vuelos');
    }

    public function agregarPasajeros() {
        $vuelo = Vuelo::find(request()->route('id'));
        $pasajeros = Pasajero::where('vuelo_id', $vuelo->id)->get();

        return view('agregar-pasajeros', [
            'vuelo' => $vuelo,
            'pasajeros' => $pasajeros
        ]);
    }

    public function guardarPasajeros(Request $request) {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'celular' => 'required|string',
            'numero_asientos' => 'required|numeric'
        ]);

        $vuelo = Vuelo::find(request()->route('id'));
        $pasajero = new Pasajero($datos);
        $pasajero->vuelo()->associate($vuelo);
        $pasajero->save();

        return redirect('/lista-vuelos');
    }
}
