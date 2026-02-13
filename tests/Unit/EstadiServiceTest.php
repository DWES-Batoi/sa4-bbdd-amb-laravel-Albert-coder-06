<?php

namespace Tests\Unit;

use App\Models\Estadi;
use App\Services\EstadiService;
use App\Repositories\EstadiRepository;
use Mockery;
use Tests\TestCase;

class EstadiServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_llistar_crida_al_repository()
    {
        $repo = Mockery::mock(EstadiRepository::class);
        $repo->shouldReceive('getAll')->once()->andReturn(collect([]));

        $service = new EstadiService($repo);
        $service->llistar();
        $this->assertTrue(true);
    }

    public function test_guardar_crida_al_repository()
    {
        $repo = Mockery::mock(EstadiRepository::class);
        $data = ['nom' => 'Mestalla', 'capacitat' => 48000];
        
        $repo->shouldReceive('create')->once()->with($data)->andReturn(new Estadi($data));

        $service = new EstadiService($repo);
        $service->guardar($data);
        $this->assertTrue(true);
    }

    public function test_actualitzar_crida_al_repository()
    {
        $repo = Mockery::mock(EstadiRepository::class);
        $data = ['nom' => 'Nou Mestalla'];
        
        $repo->shouldReceive('update')->once()->with(1, $data)->andReturn(new Estadi($data));

        $service = new EstadiService($repo);
        $service->actualitzar(1, $data);
        $this->assertTrue(true);
    }

    public function test_eliminar_crida_al_repository()
    {
        $repo = Mockery::mock(EstadiRepository::class);
        
        $repo->shouldReceive('delete')->once()->with(1);

        $service = new EstadiService($repo);
        $service->eliminar(1);
        $this->assertTrue(true);
    }
}
