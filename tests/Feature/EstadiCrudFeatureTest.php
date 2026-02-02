<?php

namespace Tests\Feature;

use App\Models\Estadi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class EstadiCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Gate::before(function () { return true; });
    }

    public function test_es_pot_llistar_estadis()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        Estadi::factory()->create(['nom' => 'Camp Nou']);
        Estadi::factory()->create(['nom' => 'Bernabéu']);

        $resp = $this->get('/estadis');
        $resp->assertStatus(200);
        $resp->assertSee('Camp Nou');
        $resp->assertSee('Bernabéu');
    }

    public function test_es_pot_crear_un_estadi()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $resp = $this->from(route('estadis.create'))
            ->post('/estadis', [
                'nom' => 'Mestalla',
                'capacitat' => 45000,
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('estadis.index'));

        $this->assertDatabaseHas('estadis', [
            'nom' => 'Mestalla',
            'capacitat' => 45000,
        ]);
    }

    public function test_es_pot_actualitzar_un_estadi()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $estadi = Estadi::factory()->create(['nom' => 'Antic Estadi', 'capacitat' => 10000]);

        $resp = $this->from(route('estadis.edit', $estadi))
            ->put("/estadis/{$estadi->id}", [
                'nom' => 'Nou Estadi',
                'capacitat' => 20000,
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('estadis.index'));

        $this->assertDatabaseHas('estadis', [
            'id' => $estadi->id,
            'nom' => 'Nou Estadi',
            'capacitat' => 20000,
        ]);
    }

    public function test_es_pot_esborrar_un_estadi()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $estadi = Estadi::factory()->create();

        $resp = $this->from(route('estadis.index'))->delete("/estadis/{$estadi->id}");

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('estadis.index'));

        $this->assertDatabaseMissing('estadis', ['id' => $estadi->id]);
    }
}
