<?php

namespace Tests\Unit;

use App\Models\Partit;
use App\Services\PartitService;
use App\Repositories\PartitRepository;
use Mockery;
use Tests\TestCase;

class PartitServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_llistar_crida_al_repository()
    {
        $repo = Mockery::mock(PartitRepository::class);
        $repo->shouldReceive('getAll')->once()->andReturn(collect([]));

        $service = new PartitService($repo);
        $service->llistar();
        $this->assertTrue(true);
    }

    public function test_guardar_crida_al_repository()
    {
        $repo = Mockery::mock(PartitRepository::class);
        $data = ['local' => 'Barça', 'visitant' => 'Madrid', 'data' => '2024-05-20'];
        
        $repo->shouldReceive('create')->once()->with($data)->andReturn(new Partit($data));

        $service = new PartitService($repo);
        $service->guardar($data);
        $this->assertTrue(true);
    }

    public function test_actualitzar_crida_al_repository()
    {
        $repo = Mockery::mock(PartitRepository::class);
        $data = ['resultat' => '2-2'];
        
        $repo->shouldReceive('update')->once()->with(1, $data)->andReturn(new Partit($data));

        $service = new PartitService($repo);
        $service->actualitzar(1, $data);
        $this->assertTrue(true);
    }

    public function test_eliminar_crida_al_repository()
    {
        $repo = Mockery::mock(PartitRepository::class);
        
        $repo->shouldReceive('delete')->once()->with(1);

        $service = new PartitService($repo);
        $service->eliminar(1);
        $this->assertTrue(true);
    }
}
