<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Models\Patient;
use App\Services\PatientService;
use App\Contracts\PatientRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;

class PatientServiceTest extends TestCase
{
    public function test_it_can_list_patients_with_search_and_pagination()
    {
        $mock_repo = Mockery::mock(PatientRepositoryInterface::class);
        $paginator = Mockery::mock(LengthAwarePaginator::class);

        $mock_repo->shouldReceive('paginate')
            ->once()
            ->with('Szűcsné', 10)
            ->andReturn($paginator)
        ;

        $service = new PatientService($mock_repo);
        $this->assertSame($paginator, $service->list('Szűcsné', 10));
    }

    public function test_it_can_show_a_patient_or_return_null()
    {
        $mock_repo = Mockery::mock(PatientRepositoryInterface::class);
        $patient = Patient::factory()->make(['id' => 1]);

        $mock_repo->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($patient)
        ;

        $service = new PatientService($mock_repo);
        $this->assertSame($patient, $service->show(1));
    }

    public function test_it_can_store_a_new_patient()
    {
        $mock_repo = Mockery::mock(PatientRepositoryInterface::class);
        $data = ['name' => 'Szűcsné Szabó Mónika'];
        $patient = Patient::factory()->make($data);

        $mock_repo->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn($patient)
        ;

        $service = new PatientService($mock_repo);
        $this->assertSame($patient, $service->store($data));
    }

    public function test_it_can_update_an_existing_patient()
    {
        $mock_repo = Mockery::mock(PatientRepositoryInterface::class);
        $patient = Patient::factory()->make(['id' => 1]);
        $data = ['name' => 'Szűcsné Szabó Mónika Alexa'];

        $mock_repo->shouldReceive('update')
            ->once()
            ->with($patient, $data)
            ->andReturn(true)
        ;

        $service = new PatientService($mock_repo);
        $this->assertTrue($service->update($patient, $data));
    }

    public function test_it_can_destroy_a_patient()
    {
        $mock_repo = Mockery::mock(PatientRepositoryInterface::class);
        $patient = Patient::factory()->make(['id' => 1]);

        $mock_repo->shouldReceive('delete')
            ->once()
            ->with($patient)
            ->andReturn(true)
        ;

        $service = new PatientService($mock_repo);
        $this->assertTrue($service->destroy($patient));
    }
}
