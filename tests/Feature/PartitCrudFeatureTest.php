<?php

namespace Tests\Feature;

use App\Models\Partit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class PartitCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Gate::before(function () { return true; });
    }

    public function test_es_pot_llistar_partits()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        Partit::factory()->create(['local' => 'FC Barcelona', 'visitant' => 'Real Madrid']);

        $resp = $this->get('/partits');
        $resp->assertStatus(200);
        $resp->assertSee('FC Barcelona');
        $resp->assertSee('Real Madrid');
    }

    public function test_es_pot_crear_un_partit()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $resp = $this->from(route('partits.create'))
            ->post('/partits', [
                'local' => 'Valencia CF',
                'visitant' => 'Levante UD',
                'data' => '2024-06-15',
                'resultat' => '2-1',
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('partits.index'));

        $this->assertDatabaseHas('partits', [
            'local' => 'Valencia CF',
            'visitant' => 'Levante UD',
            'data' => '2024-06-15',
        ]);
    }

    public function test_es_pot_actualitzar_un_partit()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $partit = Partit::factory()->create(['local' => 'A', 'visitant' => 'B', 'resultat' => '0-0']);

        $resp = $this->from(route('partits.edit', $partit))
            ->put("/partits/{$partit->id}", [
                'local' => 'A',
                'visitant' => 'B',
                'data' => (is_string($partit->data) ? $partit->data : $partit->data->format('Y-m-d')),
                'resultat' => '3-0',
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('partits.index'));

        $this->assertDatabaseHas('partits', [
            'id' => $partit->id,
            'resultat' => '3-0',
        ]);
    }

    public function test_es_pot_esborrar_un_partit()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $partit = Partit::factory()->create();

        $resp = $this->from(route('partits.index'))->delete("/partits/{$partit->id}");

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('partits.index'));

        $this->assertDatabaseMissing('partits', ['id' => $partit->id]);
    }
}
