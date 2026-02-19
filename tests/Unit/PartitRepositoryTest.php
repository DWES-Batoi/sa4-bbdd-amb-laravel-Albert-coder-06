<?php

namespace Tests\Unit;

use App\Models\Partit;
use App\Repositories\PartitRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartitRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected PartitRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new PartitRepository();
    }

    public function test_create_i_find()
    {
        $partit = $this->repo->create([
            'local' => 'Barça',
            'visitant' => 'Madrid',
            'data' => '2024-05-20',
            'resultat' => '3-1',
        ]);

        $this->assertDatabaseHas('partits', ['local' => 'Barça', 'visitant' => 'Madrid']);
        $this->assertEquals('Barça', $this->repo->find($partit->id)->local);
    }

    public function test_update_modifica_un_partit()
    {
        $partit = Partit::factory()->create(['resultat' => '0-0']);

        $this->repo->update($partit->id, ['resultat' => '1-1']);

        $this->assertDatabaseHas('partits', ['id' => $partit->id, 'resultat' => '1-1']);
    }

    public function test_delete_esborra_un_partit()
    {
        $partit = Partit::factory()->create();

        $this->repo->delete($partit->id);

        $this->assertDatabaseMissing('partits', ['id' => $partit->id]);
    }

    public function test_getAll_retorna_tots()
    {
        Partit::factory()->count(3)->create();

        $partits = $this->repo->getAll();

        $this->assertCount(3, $partits);
    }
}
