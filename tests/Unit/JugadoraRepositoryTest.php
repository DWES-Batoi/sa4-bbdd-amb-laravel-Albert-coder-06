<?php

namespace Tests\Unit;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Repositories\JugadoraRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JugadoraRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected JugadoraRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new JugadoraRepository();
    }

    public function test_create_i_find()
    {
        $equip = Equip::factory()->create();

        $jugadora = $this->repo->create([
            'nom' => 'Alexia Putellas',
            'posicio' => 'Migcampista',
            'equip' => $equip->id,
        ]);

        $this->assertDatabaseHas('jugadoras', ['nom' => 'Alexia Putellas']);
        $this->assertEquals('Alexia Putellas', $this->repo->find($jugadora->id)->nom);
    }

    public function test_update_modifica_una_jugadora()
    {
        $jugadora = Jugadora::factory()->create(['nom' => 'Antic']);

        $this->repo->update($jugadora->id, ['nom' => 'Nou']);

        $this->assertDatabaseHas('jugadoras', ['id' => $jugadora->id, 'nom' => 'Nou']);
    }

    public function test_delete_esborra_una_jugadora()
    {
        $jugadora = Jugadora::factory()->create();

        $this->repo->delete($jugadora->id);

        $this->assertDatabaseMissing('jugadoras', ['id' => $jugadora->id]);
    }

    public function test_getAll_retorna_tots()
    {
        Jugadora::factory()->count(3)->create();

        $jugadoras = $this->repo->getAll();

        $this->assertCount(3, $jugadoras);
    }
}