<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipRequest;
use App\Http\Resources\EquipResource;
use Illuminate\Http\Request;
use App\Models\Equip;

class EquipController extends Controller
{
    public function index()
    {
        return EquipResource::collection(
            Equip::query()->paginate(10)
        );
    }

    public function show(Equip $equip)
    {
        return new EquipResource($equip);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255', 'min:3'],
            'estadi_id' => ['required', 'integer', 'min:0', 'max:99', 'exists:estadis,id'],
            'titols' => ['required', 'integer', 'min:0'],
            'escut' => ['nullable', 'string', 'max:255'],
        ]);

        $equip = Equip::create($data);

        return response()->json($equip, 201);
    }

    public function update(EquipRequest $request, Equip $equip)
    {
        $equip->update($request->validated());

        return new EquipResource($equip);
    }

    public function destroy(Equip $equip)
    {
        $equip->delete();

        return response()->noContent(); // 204
    }
}