<?php

namespace App\Services;

use App\Repositories\PartitRepository;
use App\Models\Equip;
use App\Models\Estadi;

class PartitService
{
    public function __construct(private PartitRepository $repo)
    {
    }

    public function llistar()
    {
        return $this->repo->getAll();
    }

    public function trobar($id)
    {
        return $this->repo->find($id);
    }

    public function guardar(array $data)
    {
        // Convertir noms d'equips a IDs
        if (isset($data['local'])) {
            $equipLocal = Equip::where('nom', $data['local'])->first();
            $data['local_id'] = $equipLocal->id;
        }

        if (isset($data['visitant'])) {
            $equipVisitant = Equip::where('nom', $data['visitant'])->first();
            $data['visitant_id'] = $equipVisitant->id;
        }

        if (isset($data['estadi_id'])) {
            $estadi = Estadi::where('nom', $data['estadi_id'])->first();
            $data['estadi_id'] = $estadi->id;
        }

        return $this->repo->create($data);
    }

    public function actualitzar($id, array $data)
    {
        // Convertir noms d'equips a IDs
        if (isset($data['local'])) {
            $equipLocal = Equip::where('nom', $data['local'])->first();
            $data['local_id'] = $equipLocal->id;
        }

        if (isset($data['visitant'])) {
            $equipVisitant = Equip::where('nom', $data['visitant'])->first();
            $data['visitant_id'] = $equipVisitant->id;
        }

        if (isset($data['estadi_id'])) {
            $estadi = Estadi::where('nom', $data['estadi_id'])->first();
            $data['estadi_id'] = $estadi->id;
        }

        return $this->repo->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->repo->delete($id);
    }
}
