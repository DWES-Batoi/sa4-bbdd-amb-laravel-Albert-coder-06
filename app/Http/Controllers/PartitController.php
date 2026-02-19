<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartitRequest;
use App\Http\Requests\UpdatePartitRequest;
use App\Models\Partit;
use App\Models\Estadi;
use App\Events\PartitActualitzat;
use App\Services\ClassificacioService;
use App\Services\PartitService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class PartitController extends Controller
{
    public function __construct(private
        PartitService $partitService, private
        ClassificacioService $classificacioService
        )
    {
    }

    // GET /partits
    public function index()
    {
        Log::info('PartitController@index called');
        $partits = $this->partitService->llistar();
        return view('partits.index', compact('partits'));
    }

    // GET /partits/create
    public function create()
    {
        return view('partits.create');
    }

    // POST /partits
    public function store(StorePartitRequest $request)
    {

        // 1) posicions abans
        $abans = $this->classificacioService->posicionsPerEquip();

        // 2) actualitza el partit
        $this->partitService->guardar($request->validated());

        // 3) posicions després
        $despres = $this->classificacioService->posicionsPerEquip();

        // 4) calcula delta (+ = puja, - = baixa)
        $delta = [];
        foreach ($despres as $equipId => $posDespres) {
            $posAbans = $abans[$equipId] ?? $posDespres;
            $deltaPos = $posAbans - $posDespres;
            if ($deltaPos !== 0) {
                $delta[] = ['equip_id' => $equipId, 'delta' => $deltaPos];
            }
        }


        // 5) emet event 
        if (!empty($delta)) {
            event(new PartitActualitzat($delta));
        }
        

        return redirect()->route('partits.index')->with('success', 'Partit creat.');

    }

    // GET /partits/{partit}
    public function show(Partit $partit)
    {
        return view('partits.show', compact('partit'));
    }

    // GET /partits/{partit}/edit
    public function edit(Partit $partit)
    {
        $estadiNom = Estadi::query()->where('id', $partit->estadi_id)->first()->nom;
        return view('partits.edit', compact('partit', 'estadiNom'));
    }

    // PUT /partits/{partit}
    public function update(UpdatePartitRequest $request, Partit $partit)
    {
        $data = $request->validated();

        // 1) posicions abans
        $abans = $this->classificacioService->posicionsPerEquip();

        // 2) actualitza el partit
        $this->partitService->actualitzar($partit->id, $data);

        // 3) posicions després
        $despres = $this->classificacioService->posicionsPerEquip();

        // 4) calcula delta (+ = puja, - = baixa)
        $delta = [];
        foreach ($despres as $equipId => $posDespres) {
            $posAbans = $abans[$equipId] ?? $posDespres;
            $deltaPos = $posAbans - $posDespres;
            if ($deltaPos !== 0) {
                $delta[] = ['equip_id' => $equipId, 'delta' => $deltaPos];
            }
        }


        // 5) emet event 
        if (!empty($delta)) {
            event(new PartitActualitzat($delta));
        }
        

        return redirect()->route('partits.index')->with('success', 'Partit actualitzat.');
    }

    // DELETE /partits/{partit}
    public function destroy(Partit $partit)
    {
        $this->partitService->eliminar($partit->id);
        return redirect()->route('partits.index');
    }
}
