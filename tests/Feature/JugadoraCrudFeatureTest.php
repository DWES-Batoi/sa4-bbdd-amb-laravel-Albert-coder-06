<?php

namespace Tests\Feature;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class JugadoraCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Gate::before(function () { return true; });
    }

    public function test_es_pot_llistar_jugadoras()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        Jugadora::factory()->create(['nom' => 'Alexia Putellas']);
        Jugadora::factory()->create(['nom' => 'Aitana Bonmatí']);

        $resp = $this->get('/jugadoras');
        $resp->assertStatus(200);
        $resp->assertSee('Alexia Putellas');
        $resp->assertSee('Aitana Bonmatí');
    }

    public function test_es_pot_crear_una_jugadora()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $equip = Equip::factory()->create();

        $resp = $this->from(route('jugadoras.create'))
            ->post('/jugadoras', [
                'nom' => 'Mapi León',
                'posicio' => 'Defensa',
                'equip' => $equip->id,
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadoras.index'));

        $this->assertDatabaseHas('jugadoras', [
            'nom' => 'Mapi León',
            'posicio' => 'Defensa',
            'equip' => $equip->id,
        ]);
    }

    public function test_es_pot_actualitzar_una_jugadora()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $equip = Equip::factory()->create();
        $jugadora = Jugadora::factory()->create([
            'nom' => 'Antic Nom',
            'posicio' => 'Portera',
            'equip' => $equip->id,
        ]);

        $resp = $this->from(route('jugadoras.edit', $jugadora))
            ->put("/jugadoras/{$jugadora->id}", [
                'nom' => 'Nou Nom',
                'posicio' => 'Portera',
                'equip' => $equip->id,
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadoras.index'));

        $this->assertDatabaseHas('jugadoras', [
            'id' => $jugadora->id,
            'nom' => 'Nou Nom',
        ]);
    }

    public function test_es_pot_esborrar_una_jugadora()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        $jugadora = Jugadora::factory()->create();

        $resp = $this->from(route('jugadoras.index'))->delete("/jugadoras/{$jugadora->id}");

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadoras.index'));

        $this->assertDatabaseMissing('jugadoras', ['id' => $jugadora->id]);
    }
}
