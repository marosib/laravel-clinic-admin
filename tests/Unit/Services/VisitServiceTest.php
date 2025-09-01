<?php

namespace Tests\Unit\Services;

use App\Models\Patient;
use App\Models\Visit;
use App\Services\VisitService;
use App\Contracts\VisitRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class VisitServiceTest extends TestCase
{
    public function test_it_can_list_visits_for_a_patient_with_pagination()
    {
        $mock_repo = Mockery::mock(VisitRepositoryInterface::class);
        $paginator = Mockery::mock(LengthAwarePaginator::class);
        $patient = Patient::factory()->make(['id' => 1]);

        $mock_repo->shouldReceive('forPatientPaginate')
            ->once()
            ->with($patient->id, 10)
            ->andReturn($paginator)
        ;

        $service = new VisitService($mock_repo);
        $this->assertSame($paginator, $service->listForPatient($patient->id));
    }

    public function test_it_sets_visited_at_if_missing_when_storing_visit()
    {
        $mock_repo = Mockery::mock(VisitRepositoryInterface::class);
        $patient = Patient::factory()->make(['id' => 1]);
        $doctor_id = 2;
        $data = ['reason' => 'Kontroll'];

        $mock_repo->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function ($arg) use ($patient, $doctor_id) {
                return $arg['patient_id'] === $patient->id
                    && $arg['doctor_id'] === $doctor_id
                    && isset($arg['visited_at'])
                    && $arg['reason'] === 'Kontroll';
            }))
            ->andReturn(Visit::factory()->make())
        ;

        $service = new VisitService($mock_repo);
        $visit = $service->store($patient, $doctor_id, $data);

        $this->assertInstanceOf(Visit::class, $visit);
    }

    public function test_it_can_destroy_a_visit()
    {
        $mock_repo = Mockery::mock(VisitRepositoryInterface::class);
        $visit = Visit::factory()->make(['id' => 1]);

        $mock_repo->shouldReceive('delete')
            ->once()
            ->with($visit)
            ->andReturn(true)
        ;

        $service = new VisitService($mock_repo);
        $this->assertTrue($service->destroy($visit));
    }
}
