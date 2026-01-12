<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugadoraRequest;
use App\Http\Requests\UpdateJugadoraRequest;
use App\Models\Jugadora;
use App\Models\Equip;
use App\Services\JugadoraService;

class JugadoraController extends Controller
{
    public function __construct(private JugadoraService $servei) {}

    // GET /jugadoras
    public function index() {
        $jugadoras = $this->servei->llistar();
        return view('jugadoras.index', compact('jugadoras'));
    }

    // GET /jugadoras/create
    public function create() {
        $equips = Equip::all();
        return view('jugadoras.create', compact('equips'));
    }

    // POST /jugadoras
    public function store(StoreJugadoraRequest $request) {
        $this->servei->guardar($request->validated());
        return redirect()->route('jugadoras.index');
    }

    // GET /jugadoras/{jugadora}
    public function show(Jugadora $jugadora) {
        return view('jugadoras.show', compact('jugadora'));
    }

    // GET /jugadoras/{jugadora}/edit
    public function edit(Jugadora $jugadora) {
        $equips = Equip::all();
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    // PUT /jugadoras/{jugadora}
    public function update(UpdateJugadoraRequest $request, Jugadora $jugadora) {
        $this->servei->actualitzar($jugadora->id, $request->validated());
        return redirect()->route('jugadoras.index');
    }

    // DELETE /jugadoras/{jugadora}
    public function destroy(Jugadora $jugadora) {
        $this->servei->eliminar($jugadora->id);
        return redirect()->route('jugadoras.index');
    }
}
