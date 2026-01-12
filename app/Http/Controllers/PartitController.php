<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartitRequest;
use App\Http\Requests\UpdatePartitRequest;
use App\Models\Partit;
use App\Services\PartitService;

class PartitController extends Controller
{
    public function __construct(private PartitService $servei) {}

    // GET /partits
    public function index() {
        $partits = $this->servei->llistar();
        return view('partits.index', compact('partits'));
    }

    // GET /partits/create
    public function create() {
        return view('partits.create');
    }

    // POST /partits
    public function store(StorePartitRequest $request) {
        $this->servei->guardar($request->validated());
        return redirect()->route('partits.index');
    }

    // GET /partits/{partit}
    public function show(Partit $partit) {
        return view('partits.show', compact('partit'));
    }

    // GET /partits/{partit}/edit
    public function edit(Partit $partit) {
        return view('partits.edit', compact('partit'));
    }

    // PUT /partits/{partit}
    public function update(UpdatePartitRequest $request, Partit $partit) {
        $this->servei->actualitzar($partit->id, $request->validated());
        return redirect()->route('partits.index');
    }

    // DELETE /partits/{partit}
    public function destroy(Partit $partit) {
        $this->servei->eliminar($partit->id);
        return redirect()->route('partits.index');
    }
}
