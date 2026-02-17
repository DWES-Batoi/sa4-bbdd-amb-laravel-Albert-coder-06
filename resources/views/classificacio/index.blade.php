<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Classificació
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">

            <div id="alerta"
                 class="hidden mb-4 p-2 border rounded text-sm">
                Classificació actualitzada en temps real ✅
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="p-3">Pos</th>
                            <th class="p-3">Equip</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($equips as $equip)
                            <tr data-equip-id="{{ $equip->id }}" class="border-b">
                                <td class="p-3 font-semibold">
                                    {{ $posicions[$equip->id] ?? '-' }}
                                </td>
                                <td class="p-3">
                                    {{ $equip->nom }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('classificacio-delta', (ev) => {
            console.log('classificacio-delta event received:', ev.detail);
            
            // alerta
            const a = document.getElementById('alerta');
            if (a) {
                a.classList.remove('hidden');
                setTimeout(() => a.classList.add('hidden'), 2500);
            }

            // colors i posicions
            const deltas = ev.detail || [];
            deltas.forEach(item => {
                const row = document.querySelector(`[data-equip-id="${item.equip_id}"]`);
                if (!row) return;

                // Actualitzem color
                row.classList.remove('puja','baixa');
                if (item.delta > 0) row.classList.add('puja');
                if (item.delta < 0) row.classList.add('baixa');

                // Opcional: Podríem intentar actualitzar el número de la posició aquí si el tinguéssim al detall del event,
                // però l'event només envia el delta. Per veure la taula realment reordenada, forçarem un recàrrec
                // després de que l'usuari hagi vist els canvis de color.
            });

            // Si hi ha hagut canvis, recarreguem la pàgina en 3 segons per reordenar la taula
            if (deltas.length > 0) {
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            }
        });
    </script>

    <style>
        .puja  { background: #d1fae5; } /* verd clar */
        .baixa { background: #fee2e2; } /* roig clar */
    </style>
</x-app-layout>