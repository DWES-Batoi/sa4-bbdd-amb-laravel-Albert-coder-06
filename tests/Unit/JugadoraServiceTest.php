<?php

namespace Tests\Unit;

use App\Models\Jugadora;
use App\Services\JugadoraService;
use App\Repositories\JugadoraRepository;
use Mockery;
use Tests\TestCase;

class JugadoraServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_llistar_crida_al_repository()
    {
        $repo = Mockery::mock(JugadoraRepository::class);
        $repo->shouldReceive('getAll')->once()->andReturn(collect([]));

        $service = new JugadoraService($repo);
        $service->llistar();
        $this->assertTrue(true);
    }

    public function test_guardar_crida_al_repository()
    {
        $repo = Mockery::mock(JugadoraRepository::class);
        $data = ['nom' => 'Alexia', 'posicio' => 'Migcampista', 'equip' => 1];
        
        $repo->shouldReceive('create')->once()->with($data)->andReturn(new Jugadora($data));

        $service = new JugadoraService($repo);
        $service->guardar($data);
        $this->assertTrue(true);
    }

    public function test_actualitzar_crida_al_repository()
    {
        $repo = Mockery::mock(JugadoraRepository::class);
        $data = ['nom' => 'Alexia P.'];
        
        $repo->shouldReceive('update')->once()->with(1, $data)->andReturn(new Jugadora($data));

        $service = new JugadoraService($repo);
        $service->actualitzar(1, $data);
        $this->assertTrue(true);
    }

    public function test_eliminar_crida_al_repository()
    {
        $repo = Mockery::mock(JugadoraRepository::class);
        
        $repo->shouldReceive('delete')->once()->with(1);

        $service = new JugadoraService($repo);
        $service->eliminar(1);
        $this->assertTrue(true);
    }
}
