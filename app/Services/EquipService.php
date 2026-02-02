<?php

namespace App\Services;

use App\Repositories\BaseRepository;

class EquipService {
    public function __construct(private BaseRepository $repo) {}

    public function llistar() {
        return $this->repo->getAll();
    }

    public function trobar($id){
        return $this->repo->find($id);
    }

    public function guardar(array $data, $escut = null) {
        if ($escut) {
            $data['escut'] = $escut->store('escuts', 'public');
        }
        return $this->repo->create($data);
    }

    public function actualitzar($id, array $data, $nouEscut = null) {
        $equip = $this->repo->find($id);

        if ($nouEscut) {
            if ($equip->escut) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($equip->escut);
            }
            $data['escut'] = $nouEscut->store('escuts', 'public');
        }

        return $this->repo->update($id, $data);
    }

    public function eliminar($id) {
        $equip = $this->repo->find($id);
        if ($equip && $equip->escut) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($equip->escut);
        }
        return $this->repo->delete($id);
    }
}